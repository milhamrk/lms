<?php

namespace App\PaymentChannels\Drivers\MercadoPago;

use App\Models\Order;
use App\Models\PaymentChannel;
use App\PaymentChannels\IChannel;
use Illuminate\Http\Request;
use MercadoPago\SDK as Mercado;
use MercadoPago\Preference as MercadoPreference;
use MercadoPago\Item as MercadoItem;

class Channel implements IChannel
{
    protected $currency;
    protected $public_key;
    protected $access_token;
    protected $client_id;
    protected $client_secret;
    protected $order_session_key;

    /**
     * Channel constructor.
     * @param PaymentChannel $paymentChannel
     */
    public function __construct(PaymentChannel $paymentChannel)
    {
        $this->currency = currency();

        $this->public_key = env('MERCADO_PAGO_PUBLIC_KEY');
        $this->access_token = env('MERCADO_PAGO_ACCESS_TOKEN');
        $this->client_id = env('MERCADO_CLIENT_ID');
        $this->client_secret = env('MERCADO_CLIENT_SECRET');

        $this->order_session_key = 'strip.payments.order_id';
    }

    public function paymentRequest(Order $order)
    {
        Mercado::setAccessToken($this->access_token);


        /*Mercado::setPublicKey($this->api_key);
        Mercado::setClientId(env('MERCADO_CLIENT_ID'));
        Mercado::setClientSecret(env('MERCADO_CLIENT_SECRET'));*/

        $generalSettings = getGeneralSettings();
        $user = $order->user;
        $orderItems = $order->orderItems;

        $items = [];
        foreach ($orderItems as $orderItem) {
            $item = new MercadoItem();

            $item->id = $orderItem->id;
            $item->title = "item " . $orderItem->id;
            $item->quantity = 1;
            $item->unit_price = $orderItem->total_amount;
            $item->currency_id = "ARS";

            $items[] = $item;
        }

        $preference = new MercadoPreference();
        $preference->items = $items;
        $preference->back_urls = $this->makeCallbackUrl($order);

        $preference->save();

        $preference->payment_methods = array(
            "excluded_payment_types" => array(
                array("id" => "credit_card")
            ),
            "installments" => 12
        );


        session()->put($this->order_session_key, $order->id);

        return $preference->sandbox_init_point;
    }

    private function makeCallbackUrl($order)
    {
        return [
            'success' => url("/payments/verify/MercadoPago"),
            'failure' => url("/payments/verify/MercadoPago"),
            'pending' => url("/payments/verify/MercadoPago"),
        ];
    }

    public function verify(Request $request)
    {
        $data = $request->all();
        $status = $data['status']; // approved or pending

        $order_id = session()->get($this->order_session_key, null);
        session()->forget($this->order_session_key);

        $user = auth()->user();

        $order = Order::where('id', $order_id)
            ->where('user_id', $user->id)
            ->first();

        if (!empty($order)) {

            if ($status == 'approved') {
                $order->update([
                    'status' => Order::$paying,
                    'payment_data' => json_encode($data),
                ]);

                return $order;
            }


            $order->update([
                'status' => Order::$fail,
                'payment_data' => json_encode($data),
            ]);
        }

        return $order;
    }
}
