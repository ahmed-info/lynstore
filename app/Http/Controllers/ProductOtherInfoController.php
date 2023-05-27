<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductOtherInfo;
use App\Models\Product;
class ProductOtherInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $products = Product::all();
        $ProductOtherInfos = ProductOtherInfo::all();
        return view('pages.ProductOtherInfos.list',compact('ProductOtherInfos','products'));
    }
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
        $products =Product::all();

        return view('pages.ProductOtherInfos.create',compact('products')
        );
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
            'title_en'=>'required|string',
            'title_ar' =>'required|string',
            'description_en'=>'nullable|string',
            'description_ar'=>'nullable|string',
            'product_id'=>'required|numeric',
         ]);

        $ProductOtherInfos = new ProductOtherInfo;

        $ProductOtherInfos->title_en = $request->title_en;
        $ProductOtherInfos->title_ar = $request->title_ar;
        $ProductOtherInfos->description_en= $request->description_en;
        $ProductOtherInfos->description_ar= $request->description_ar;
        $ProductOtherInfos->product_id= $request->product_id;

        $ProductOtherInfos->save();
        return redirect()->route('dashboard.productOtherInfos.list')->with('status', "product other info created successfully");
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
        $ProductOtherInfo = ProductOtherInfo::find($id);
        $products = Product::all();
        return view('pages.ProductOtherInfos.edit', compact('ProductOtherInfo','products'));
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
            'title_en'=>'required|string',
            'title_ar' =>'required|string',
            'description_en'=>'nullable|string',
            'description_ar'=>'nullable|string',
            'product_id'=>'nullable|numeric',
         ]);

        $ProductOtherInfo = ProductOtherInfo::find($id);

        $ProductOtherInfo->title_en = $request->title_en;
        $ProductOtherInfo->title_ar = $request->title_ar;
        $ProductOtherInfo->description_en= $request->description_en;
        $ProductOtherInfo->description_ar= $request->description_ar;
        $ProductOtherInfo->product_id= $request->product_id;

        $ProductOtherInfo->update();
        return redirect()->route('dashboard.productOtherInfos.list')->with('status', "product other info updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProductOtherInfo = ProductOtherInfo::find($id);

        $ProductOtherInfo->delete();
        return redirect()->route('dashboard.productOtherInfos.list')->with('status','Product other info Deleted Successfully');
    }
}
