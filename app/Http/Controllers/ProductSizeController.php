<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductSize;

class ProductSizeController extends Controller
{
    public function list()
    {
        $productSizes = ProductSize::all();
        return view('pages.productSize.list',compact('productSizes'));
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
        return view('pages.productSize.create');
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
            'size'=>'required|string',
         ]);
         $productSize = new ProductSize;
         $productSize->size = $request->size;
         $productSize->activeOrNot = 1;
          $productSize->save();
         return redirect()->route('dashboard.productSizes.list')->with('status', "Size created successfully");
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
        $productSize = ProductSize::find($id);

        //dd($data);
        return view('pages.productSize.edit', compact('productSize'));
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
            'size'=>'required|string',
         ]);
         $productSize = ProductSize::find($id);
         $productSize->size = $request->size;
         $productSize->activeOrNot = 1;
          $productSize->update();
         return redirect()->route('dashboard.productSizes.list')->with('status', "Size Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productSize = ProductSize::find($id);

        $productSize->delete();
        return redirect()->route('dashboard.productSizes.list')->with('status','Size Deleted Successfully');
    }
}
