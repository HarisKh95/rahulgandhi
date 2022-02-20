<?php


namespace App\PaymentGateway\Gateways;

use App\PaymentGateway\PaymentGatewayBase;

use Nimbbl\Api\NimbblApi;
use Nimbbl\Api\NimbblError;
use Nimbbl\Api\NimbblErrorCode;
use Nimbbl\Api\NimbblOrder;
use Nimbbl\Api\NimbblRefund;
use Nimbbl\Api\NimbblRequest;
use Nimbbl\Api\NimbblSegment;
use Nimbbl\Api\NimbblTransaction;
use Nimbbl\Api\NimbblUser;
use Nimbbl\Api\NimbblUtil;
use Nimbbl\Api\NimbblEntity;


class Nimbbl extends PaymentGatewayBase
{

    private $_api;
    /**
      * */
    public function __construct(){
        /** Nimbbl api  **/
        $nimbbl_conf = config('nimbbl');
        $this->_api = new NimbblApi($nimbbl_conf['access_key'],$nimbbl_conf['security_key']);
    }

    /**
     * this payment gateway will not work with this package
     * @ https://github.com/razorpay/razorpay-php
     * */
    public function charge_amount($amount)
    {
        // TODO: Implement charge_amount() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return $amount;
        }
        return self::get_amount_in_inr($amount);
    }

    /**
     *
     * @param array $args
     * require param list
     * request
     * @return array|string[]
     *
     */
    public function ipn_response($args)
    {

            $success = true;

            // $error = "Payment Failed";
            if (empty($args) === false)
            {

                if($args->payload->status=='failed')
                {
                    $success = false;
                }
                else{
                    $api = $this->_api;
                    $nimbbl_transaction_id=$args->payload->nimbbl_transaction_id;
                    $nimbbl_signature=$args->payload->nimbbl_signature;
                    $currency=$args->currency;
                    $total_amount=$args->total_amount;
                    // dd($args->payload);
                    try
                    {
                        // Please note that the Nimbbl order ID must
                        // come from a trusted source (session here, but
                        // could be database or something else)
                        $attributes = array(
                            'merchant_order_id' => session()->get('Merchant_order_id', 'merchant_order_id'),
                            'nimbbl_transaction_id' => $nimbbl_transaction_id,
                            'nimbbl_signature' => $nimbbl_signature,
                            'order_amount' => floatval($total_amount),
                            'order_currency' => $currency
                        );
    
                        
                        $api->util->verifyPaymentSignature($attributes);
                    }
                    catch(NimbblError $e)
                    {
                        $success = false;
                    }
                }

            }

            if ($success === true)
            {
                return true;
            }
            else
            {
                return false;
            }

    }

    /**
     *
     * @param array $args
     * @paral list
     * price
     * title
     * description
     * route
     * order_id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function charge_customer($args)
    {

        // TODO: Implement charge_customer() method.
        $api = $this->_api;
        // dd(json_encode($args));
        // dd($args);
        $newOrder = $api->order->create($args);
        $newOrder = $api->order->create($args);
        // dd($newOrder);
        return view('payment.nimbbl')->with('order_data',$newOrder)->with('id',$args['order_id'])->with('currency',$args['currency'])->with('total_amount',$args['total_amount']);
    }

    public function supported_currency_list()
    {
        // TODO: Implement supported_currency_list() method.
        return ['INR'];
    }

    public function charge_currency()
    {
        // TODO: Implement charge_currency() method.
        if (in_array(self::global_currency(), $this->supported_currency_list())){
            return self::global_currency();
        }
        return  "INR";
    }

    public function gateway_name()
    {
        // TODO: Implement geteway_name() method.
        return 'nimbbl';
    }

}