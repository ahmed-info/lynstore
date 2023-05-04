<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Brand;
use Image;
class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        return view('pages.brand.list',compact('brands'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index brand";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.brand.create');
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
            'imageLogo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'imageBackground'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
         ]);
         $brand = new Brand;
         $brand->title_en = $request->title_en;
         $brand->title_ar = $request->title_ar;

         //image logo
        if($request->file('imageLogo')){

            $imageLogo = $request->file('imageLogo');
            $filename = time().'_'.$imageLogo->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imageLogo->move("images/brand",$filename); //move to file
            $brand->imageLogo = 'brand'.'/'.$filename;
         }

         if($request->file('imageBackground')){
            $imageBackground = $request->file('imageBackground');
            $filename = time().'_'.$imageBackground->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imageBackground->move("images/brand",$filename); //move to file
            $brand->imageBackground = 'brand'.'/'.$filename;
         }
          $brand->save();
         return redirect()->route('dashboard.brands.list')->with('status', "brand created successfully");

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
        $brand = Brand::find($id);
        return view('pages.brand.edit', compact('brand'));
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
            'imageLogo'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'imageBackground'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
         ]);
         $brand = Brand::find($id);
         $brand->title_en = $request->title_en;
         $brand->title_ar = $request->title_ar;

         if($request->file('imageLogo')){
            $destination = 'images/'. $brand->imageLogo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $imageLogo = $request->file('imageLogo');
            $filename = time().'_'.$imageLogo->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $imageLogo->move("images/brand",$filename); //move to file
            $brand->imageLogo = 'brand'.'/'.$filename;
         }

         if($request->file('imageBackground')){
            $destination2 = 'images/'. $brand->imageBackground;
            if(File::exists($destination2)){
                File::delete($destination2);
            }
            $imageBackground = $request->file('imageBackground');
            $filename = time().'_'.$imageBackground->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imageBackground->move("images/brand",$filename); //move to file
            $brand->imageBackground = 'brand'.'/'.$filename;
         }
          $brand->update();
          $request->session()->flash('status','The Brand created successfully');
         return redirect()->route('dashboard.brands.list')->with('status', "brand updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        $destination = 'images/'. $brand->imageLogo;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $destination2 = 'images/'. $brand->imageBackground;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $brand->delete();
        return redirect()->route('dashboard.brands.list')->with('status','Brand Deleted Successfully');
    }
}
