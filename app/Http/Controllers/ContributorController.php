<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contributor;
use App\Member;
use App\amountView;

class ContributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contributor::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('contributions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        return $input;
        
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
          'PhoneNumber' => $input->,
          'CallBackURL' => request()->fullurl().'/api/callbacks',
          'AccountReference' => 'xE6v5EcX',
          'TransactionDesc' => 'Test Payment'
        );
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        



        // Contributor::create($request->all());
        $balance = amountView::where('id', $request->member_id)->get();
        if($balance > 0){
            $member_request = Member::findOrFail($request->member_id);
        }
        
        $balance = amountView::where('id', $member_id)->get();
        if($balance[0]->balanace < 1){
            $ontributors = Contributor::get();
            foreach($ontributors as $ontributor){
                $this.sms($contributor->phoneNumber);
            }
        }
        return view('contributions/index', compact('member_request'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $contribution = Contributor::with('memeber')->findOrFail($id);
        $member_request = Member::findOrFail($id);
        return view('contributions/index', compact('member_request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit method";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "update method";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function sms($phoneNumber){
        $url = 'http://messaging-test.ap-southeast-1.elasticbeanstalk.com/sms';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer eyJhbGciOiJSUzUxMiJ9.eyJzdWIiOiJoYWNrNGhlYWx0aCIsImdyYW50cyI6eyIxIjoiQXc9PSJ9LCJleHAiOjE1MDY3ODQ0Nzl9.szR28Y9zo2ftu6uioTYystdeFSdyPQ0eB8YoJU_ru3_12GBDqH23tvfsapcMjP0R9qdbneBem1dMVVMKlND_cJUBYsybIk7V75rs4cRYyskgUH7DDv6LACnn8oQL51wH71Ya90nRlUppbiWvsRi-RXA2yvgnMZhnakaTbQdRqB0 ')); //setting custom header
            
        $message =  array( 'message' => 'Hello, Thank you very much for the contributions', 'phoneNumber' => $phoneNumber );

        $data_string = json_encode($message);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        echo $curl_response;
    }
}
