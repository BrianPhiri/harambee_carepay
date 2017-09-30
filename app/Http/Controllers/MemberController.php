<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
//        return Member::all();
//        return Member::with('balance')->get();
        $memberHarambees = Member::with('balance')->where('user_id', Auth::id())->get()->sortByDesc('created_at');
//        return $memberHarambees;
        if($memberHarambees->count() == 0) {
            return redirect('/harambee/create');
        }
        else {
            return view('harambee.index', compact('memberHarambees'));
        };
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harambee/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = null;
        if($request->hasFile('image'))
        {
            $application_file = $request->file('image');
            $application_ext = $application_file->getClientOriginalExtension();
            $path = $application_file->storeAs('public', time().'.'.$application_ext);
        }

//        return $path;
        $member = new \App\Member;
        $member->phoneNumber = $request->phoneNumber;
        $member->description = $request->description;
        $member->amount = $request->amount;
        $member->image = $path;
        $member->user_id = Auth::id();

        $member->save();

        $request->session()->flash('success_message', 'The request has been successfully created.');

        return redirect('harambee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Member::where('id',$id)->with('contribution')->get();
        $memberHarambees = Member::with('balance')->where('user_id', $id)->get();
        // return $memberHarambees;
        // $balances = App\amountView::where('id', $id)->get();
        return view('harambee.index', compact('memberHarambees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
