<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
class CouponController extends Controller
{
    public function list()
    {
        $coupons = Coupon::all();
        return view('pages.coupon.list',compact('coupons'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required',
            'description_en'=>'nullable',
            'description_ar'=>'nullable',
            'use_times'=>'required|numeric',
            'start_date'=>'nullable|date_format:Y-m-d',
            'expire_date'=>'required_with:start_date|date_format:Y-m-d',
            'graeter_than'=>'nullable|numeric',
            'status'=>'required',
          ]);
         $coupon = new Coupon;
         $coupon->code = $request->code;
         $coupon->type = $request->type;
         $coupon->value= $request->value;
         $coupon->description_en= $request->description_en;
         $coupon->description_ar= $request->description_ar;
         $coupon->use_times= $request->use_times;
         $coupon->start_date= $request->start_date;
         $coupon->expire_date= $request->expire_date;
         $coupon->graeter_than= $request->graeter_than;
         $coupon->status= $request->status;
         $coupon->save();
         return redirect()->route('dashboard.coupons.list')->with('status', "coupon created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('pages.coupon.edit', compact('coupon'));
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
        $this->validate($request,[
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required',
            'description_en'=>'nullable',
            'description_ar'=>'nullable',
            'use_times'=>'required|numeric',
            'start_date'=>'nullable|date_format:Y-m-d',
            'expire_date'=>'required_with:start_date|date_format:Y-m-d',
            'graeter_than'=>'nullable|numeric',
            'status'=>'required',
          ]);
         $coupon = Coupon::find($id);
         $coupon->code = $request->code;
         $coupon->type = $request->type;
         $coupon->value= $request->value;
         $coupon->description_en= $request->description_en;
         $coupon->description_ar= $request->description_ar;
         $coupon->use_times= $request->use_times;
         $coupon->start_date= $request->start_date;
         $coupon->expire_date= $request->expire_date;
         $coupon->graeter_than= $request->graeter_than;
         $coupon->status= $request->status;
         $coupon->update();
         return redirect()->route('dashboard.coupons.list')->with('status', "coupon updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);

        $coupon->delete();
        return redirect()->route('dashboard.coupons.list')->with('status','Coupon Deleted Successfully');
    }
}
