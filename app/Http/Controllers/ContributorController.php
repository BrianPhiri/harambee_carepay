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
        Contributor::create($request->all());
        $balance = amountView::where('id', $request->member_id)->get();
        if($balance > 0){
            $member_request = Member::findOrFail($request->member_id);
        }
        
        $balance = amountView::where('id', $member_id)->get();
        if($balance[0]->balanace < 1){
            $ontributors = Contributor::get();
            foreach($ontributors as $ontributor){
                sms($contributor->phoneNumber);
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
