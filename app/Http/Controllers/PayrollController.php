<?php

namespace App\Http\Controllers;

use App\Payroll;
use Illuminate\Http\Request;
use App\Department;
use App\Position;
use App\Staff;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();
        $staff = Staff::all();

        return view('backend.payrolls.index',compact('positions','staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "staff_id"=>"required",
            "a_bonus"=>"required",
            "a_dedu"=>"required",
            "o_bonus"=>"required",
            "o_dedu"=>"required",
            "ssb" =>"required"
        ]);

        //data store

         $payroll= new Payroll;
         $payroll->staff_id= $request->staff_id;
         $payroll->attendance_bonus= $request->a_bonus;
         $payroll->attendance_deduction= $request->a_dedu;
         $payroll->other_bonus= $request->o_bonus;
         $payroll->other_deduction = $request->o_dedu;
         $payroll->ssb = $request->ssb;
         $payroll->save();

        //return redirect
         return redirect()->route('payrolls.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }

    public function getstaff(Request $request)
    {
        $position = $request->position;
        $staff = Staff::where('position_id',$position)->get();
        return $staff;
    }

    public function getastaff(Request $request)
    {
        $id = $request->id;
        $staff = Staff::find($id);
        return $staff;
    }
}
