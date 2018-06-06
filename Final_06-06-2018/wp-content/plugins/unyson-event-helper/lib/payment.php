<?php
require_once( UNYSON_EVENT_HELPER_DIR . '/vendor/autoload.php');
use Omnipay\Omnipay;

if(! function_exists('fw_ext_events_go_paypal')) :
  function fw_ext_events_payment_paypal_get_link($params = array()) {
    $params = array_merge(array(
      'username'    => '',
      'password'    => '',
      'signature'   => '',
      'test_mode'   => false,

      'name'        => '',
      'description' => '',
      'amount'      => 0,
      'currency'    => 'USD',
      'returnUrl'   => '',
      'cancelUrl'   => '',
    ), $params);

    extract($params);

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername($username); // here you should place the email of the business sandbox account
    $gateway->setPassword($password); // here will be the password for the account
    $gateway->setSignature($signature); // and the signature for the account
    $gateway->setTestMode($test_mode);

    $response = $gateway->purchase(
      array(
        'name'        => $name,
        'description' => $description,
        'amount'      => $amount,
        'currency'    => $currency,
        'returnUrl'   => $returnUrl,
        'cancelUrl'   => $cancelUrl
      )
    )->send();

    return $response->getRedirectUrl();
  }
endif;

if(! function_exists('fw_ext_events_payment_paypal_complete_purchase')) :
  function fw_ext_events_payment_paypal_complete_purchase($params = array()) {
    $params = array_merge(array(
      'username'    => '',
      'password'    => '',
      'signature'   => '',
      'test_mode'   => false,

      'name'        => '',
      'description' => '',
      'amount'      => 0,
      'currency'    => 'USD',
      'returnUrl'   => '',
      'cancelUrl'   => '',
    ), $params);

    extract($params);

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername($username); // here you should place the email of the business sandbox account
    $gateway->setPassword($password); // here will be the password for the account
    $gateway->setSignature($signature); // and the signature for the account
    $gateway->setTestMode($test_mode);

    return $response = $gateway->completePurchase(
      array(
        'name'        => $name,
        'description' => $description,
        'amount'      => $amount,
        'currency'    => $currency,
        'returnUrl'   => $returnUrl,
        'cancelUrl'   => $cancelUrl
      )
    )->send();

    // $data = $response->getData();
    // $txnRef = $response->getTransactionReference();
    // echo '<pre>'; print_r($data);
    // echo $txnRef;
  }
endif;
