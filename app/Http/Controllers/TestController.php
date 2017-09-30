<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\amountView;
class TestController extends Controller
{
    public function sms(){
        $url = 'http://messaging-test.ap-southeast-1.elasticbeanstalk.com/sms';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer eyJhbGciOiJSUzUxMiJ9.eyJzdWIiOiJoYWNrNGhlYWx0aCIsImdyYW50cyI6eyIxIjoiQXc9PSJ9LCJleHAiOjE1MDY3ODQ0Nzl9.szR28Y9zo2ftu6uioTYystdeFSdyPQ0eB8YoJU_ru3_12GBDqH23tvfsapcMjP0R9qdbneBem1dMVVMKlND_cJUBYsybIk7V75rs4cRYyskgUH7DDv6LACnn8oQL51wH71Ya90nRlUppbiWvsRi-RXA2yvgnMZhnakaTbQdRqB0 ')); //setting custom header
            
        $message =  array(
            'message' => 'Hello',
            'phoneNumber' => '+254796792840'
        );

        $data_string = json_encode($message);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

    // public function sendSmS(){
    //     $url = 'http://messaging-test.ap-southeast-1.elasticbeanstalk.com/sms';
        
    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer eyJhbGciOiJSUzUxMiJ9.eyJzdWIiOiJoYWNrNGhlYWx0aCIsImdyYW50cyI6eyIxIjoiQXc9PSJ9LCJleHAiOjE1MDY3ODQ0Nzl9.szR28Y9zo2ftu6uioTYystdeFSdyPQ0eB8YoJU_ru3_12GBDqH23tvfsapcMjP0R9qdbneBem1dMVVMKlND_cJUBYsybIk7V75rs4cRYyskgUH7DDv6LACnn8oQL51wH71Ya90nRlUppbiWvsRi-RXA2yvgnMZhnakaTbQdRqB0 ')); //setting custom header
        
        
    //     $curl_post_data = array(
    //       'message' : "Hello",
    //       'phoneNumber' : "+254"
    //     );

    //     $data_string = json_encode($curl_post_data);
    // }

    public function payment(){

        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode('8n8adgPEAzN17GwtDI1rusZPoubxjqcl:OKO68x1hyQVyDwMr');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $curl_response = curl_exec($curl);
        
        echo json_decode($curl_response);

        // $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);
        // $credentials = base64_encode('8n8adgPEAzN17GwtDI1rusZPoubxjqcl:OKO68x1hyQVyDwMr');
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer V7hW9QzmeWFxDon4e1XElA8rXCMs')); //setting custom header

        
        // $curl_post_data = array(
        //   //Fill in the request parameters with valid values
        //   'BusinessShortCode' => '174379',
        //   'Password' => 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTcwOTMwMDQxMTUy',
        //   'Timestamp' => '20170930041152',
        //   'TransactionType' => 'CustomerPayBillOnline',
        //   'Amount' => 1,
        //   'PartyA' => '254708374149',
        //   'PartyB' => '174379',
        //   'PhoneNumber' => '254796792840',
        //   'CallBackURL' => 'https://safaricom.co.ke/mpesa_online/lnmo_checkout_server.php?wsdl',
        //   'AccountReference' => 'xE6v5EcX',
        //   'TransactionDesc' => 'Test Payment'
        // );
        
        // $data_string = json_encode($curl_post_data);
        
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        // $curl_response = curl_exec($curl);
        // print_r($curl_response);
        
        // echo $curl_response;
    }


    public function balance(){
        $balance = amountView::where('id', 3)->get();
        return $balance[0]->balanace;
    }
}
