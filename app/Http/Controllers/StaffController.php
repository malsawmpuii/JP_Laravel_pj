<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff=Staff::all();
        return view('backend.staff.index',compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
        $request->validate([
            "name"=>"required",
            "profile"=>"required",
            "phoneno"=>"required",
            "address"=>"required",
            "salary"=>"required"
        ]);

        //if file include, upload
         if ($request->file()) {
             $fileName= time().'_'.$request->profile->getClientOriginalName();
             $filePath= $request->file('profile')->storeAs('staff_profile',$fileName,'public');
             $filePath='/storage/'.$filePath;
         }
        //data store

         $staff= new Staff;
         $staff->name= $request->name;
         $staff->profile= $filePath;
         $staff->phoneno= $request->phoneno;
         $staff->address= $request->address;
         $staff->salary= $request->salary;
         $staff->save();

        //return redirect
         return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('backend.staff.detail',compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $staff=Staff::find($id);
        return view('backend.staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
