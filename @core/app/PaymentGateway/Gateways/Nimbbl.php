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
    // public function __construct(){
    //     /** Nimbbl api  **/
    //     $nimbbl_conf = config('nimbbl');
    //     $this->_api = new NimbblApi($nimbbl_conf['access_key'],$nimbbl_conf['security_key']);
    // }

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
    public function ipn_response(array $args)
    {
        // TODO: Implement ipn_response() method.
        $request = $args['request'];
        $api = $this->_api;
        $order_data = array(
            'order_id' => $request->order_id,
            'payment_mode' => $request->payment_mode,
            'transaction_id' => $request->transaction_id
        );


        //Fetch transaction information by nimbbl_transaction_id
        $transaction = $api->transaction->transactionEnquiry($order_data);

        if (!empty($transaction)) {
            try {
                $transaction = $api->transaction->retrieveOne($request->transaction_id);
                if (empty($transaction)) {
                    return ['status' => 'failed'];
                }
                return $this->verified_data([
                   'status' => 'complete',
                   'transaction_id' =>  $request->transaction_id
                ]);
            } catch (\Exception $e) {
                return ['status' => 'failed'];
            }
        }

        return ['status' => 'failed'];
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
    public function charge_customer(array $args)
    {
        // TODO: Implement charge_customer() method.
        $api = $this->_api;
        $nimbbl_conf = config('nimbbl');
        $api = new NimbblApi($nimbbl_conf['access_key'],$nimbbl_conf['security_key']);
            $newOrder = $api->order->create($args);
        return view('payment.nimbbl')->with('order_data', $newOrder);
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