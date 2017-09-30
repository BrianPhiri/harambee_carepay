<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contributor;

class PaymentController extends Controller
{
    public function payment(Request $request){
        $input = $request->all();

        // $url_auth = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        
        // $curl_auth = curl_init();
        // curl_setopt($curl_auth, CURLOPT_URL, $url_auth);
        // $credentials = base64_encode('8n8adgPEAzN17GwtDI1rusZPoubxjqcl:OKO68x1hyQVyDwMr');
        // curl_setopt($curl_auth, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        // curl_setopt($curl_auth, CURLOPT_HEADER, true);
        // curl_setopt($curl_auth, CURLOPT_SSL_VERIFYPEER, false);
        
        // $curl_response = curl_exec($curl_auth);


        // After gettig the token

        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        // $credentials = base64_encode('8n8adgPEAzN17GwtDI1rusZPoubxjqcl:OKO68x1hyQVyDwMr');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer wl9L8WEmxKvicGO10jZYGkz6GrfM')); //setting custom header

        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => '174379',
          'Timestamp' => '20170930041152',
          'Password' => base64_encode('174379bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c91920170930041152'),
          'TransactionType' => 'CustomerPayBillOnline',
          'Amount' => 1,
          'PartyA' => '254708374149',
          'PartyB' => '174379',
          'PhoneNumber' => '254796792840',
          'CallBackURL' => request()->fullurl().'/api/callbacks',
          'AccountReference' => 'xE6v5EcX',
          'TransactionDesc' => 'Test Payment'
        );
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response_after_pay = curl_exec($curl);
        
        echo $curl_response_after_pay;

    }

    public function paymentCallBack(Request $request){
        $input = $request->all();
        // return $input['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
        $contributor = new Contributor;
        $contributor->phoneNumber = $input['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];
        $contributor->amount = $input['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $contributor->member_id = 1;
        $contributor->save();
    }

}
