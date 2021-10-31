<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class salesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $sales;

    public function __construct($sales)
    {
        $this->sales = $sales;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        return $this->sales;
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            trans('admin/main.id'),
            trans('admin/main.student'),
            trans('admin/main.student') . ' ' . trans('admin/main.id'),
            trans('admin/main.instructor'),
            trans('admin/main.instructor') . ' ' . trans('admin/main.id'),
            trans('admin/main.paid_amount'),
            trans('admin/main.item'),
            trans('admin/main.item') . ' ' . trans('admin/main.id'),
            trans('admin/main.sale_type'),
            trans('admin/main.date'),
            trans('admin/main.status'),
        ];
    }

    /**
     * @inheritDoc
     */
    public function map($sale): array
    {

        if ($sale->payment_method == \App\Models\Sale::$subscribe) {
            $paidAmount = trans('admin/main.subscribe');
        } else {
            if (!empty($sale->total_amount)) {
                $paidAmount = currencySign() . (number_format($sale->total_amount, 2, ".", "") + 0);
            } else {
                $paidAmount = trans('public.free');
            }
        }

        $status = (!empty($sale->refund_at)) ? trans('admin/main.refund') : trans('admin/main.success');

        return [
            $sale->id,
            $sale->buyer->full_name,
            $sale->buyer->id,
            $sale->item_seller,
            $sale->seller_id,
            $paidAmount,
            $sale->item_title,
            $sale->item_id,
            trans('admin/main.' . $sale->type),
            dateTimeFormat($sale->created_at, 'j F Y H:i'),
            $status
        ];
    }
}
