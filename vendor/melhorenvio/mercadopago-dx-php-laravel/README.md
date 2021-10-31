**No more doctrine/common and doctrine/annotations issues when using Laravel Framework.**

## Why made a fork?

Refer this issues/pull requests:

https://github.com/mercadopago/dx-php/issues/78

https://github.com/mercadopago/dx-php/issues/106

https://github.com/mercadopago/dx-php/pull/136

## Mercado Pago SDK for PHP

This library provides developers with a simple set of bindings to the Mercado Pago API.

### PHP Versions Supported:

The SDK supports PHP 5.6 or major

### Installation 

#### Using Composer

1. Download [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos) if not already installed
2. Go to your project directory and run `composer require mercadopago/dx-php` on the command line.
3. This how your directory structure would look like.

![screen shot 2017-12-27 at 7 07 47 pm](https://user-images.githubusercontent.com/864790/34394635-44f7745a-eb39-11e7-981d-77cf759cf05f.png)

4. Thats all, you have Mercado Pago SDK installed.

### Quick Start 

1. You have to require the library from your Composer vendor folder.

  ```php
  require __DIR__  . '/vendor/autoload.php';
  ```

2. Setup your credentials or major
10
​
11


  You have two types of credentials:

  * **For API or custom checkout:**
    ```php
    MercadoPago\SDK::setAccessToken("YOUR_ACCESS_TOKEN");      // On Production
    MercadoPago\SDK::setAccessToken("YOUR_TEST_ACCESS_TOKEN"); // On Sandbox
    ```
  * **For Web-checkout:**
    ```php
    MercadoPago\SDK::setClientId("YOUR_CLIENT_ID");
    MercadoPago\SDK::setClientSecret("YOUR_CLIENT_SECRET");
    ```

3. Using resource objects.

  You can interact with all the resources available in the public API, to this each resource is represented by classes according to the following diagram:
  
  ![sdk resource structure](https://user-images.githubusercontent.com/864790/34393059-9acad058-eb2e-11e7-9987-494eaf19d109.png)
  
  **Sample**
  
```php
  <?php
  
    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("YOUR_ACCESS_TOKEN");

    $payment = new MercadoPago\Payment();

    $payment->transaction_amount = 141;
    $payment->token = "YOUR_CARD_TOKEN";
    $payment->description = "Ergonomic Silk Shirt";
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
      "email" => "larue.nienow@hotmail.com"
    );

    $payment->save();

    echo $payment->status;

  ?>
```
  
### Support 

Write us at [developers.mercadopago.com](https://developers.mercadopago.com)
