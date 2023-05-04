<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\Product;
class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $products = Product::all();
        $productDetails = ProductDetail::all();
        return view('pages.productDetails.list',compact('productDetails','products'));
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

        return view('pages.productDetails.create',compact('products')
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
            'product_id'=>'nullable|numeric',
         ]);

        $productDetails = new ProductDetail;

        $productDetails->title_en = $request->title_en;
        $productDetails->title_ar = $request->title_ar;
        $productDetails->description_en= $request->description_en;
        $productDetails->description_ar= $request->description_ar;
        $productDetails->product_id= $request->product_id;

        $productDetails->save();
        return redirect()->route('dashboard.productDetails.list')->with('status', "product Details created successfully");
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
        $productDetail = ProductDetail::find($id);
        return view('pages.productDetails.edit', compact('productDetail'));
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

        $productDetail = ProductDetail::find($id);

        $productDetail->title_en = $request->title_en;
        $productDetail->title_ar = $request->title_ar;
        $productDetail->description_en= $request->description_en;
        $productDetail->description_ar= $request->description_ar;
        $productDetail->product_id= $request->product_id;

        $productDetail->update();
        return redirect()->route('dashboard.productDetails.list')->with('status', "product Details updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productDetail = ProductDetail::find($id);

        $productDetail->delete();
        return redirect()->route('dashboard.productDetails.list')->with('status','Produc tDetails Deleted Successfully');
    }
}
