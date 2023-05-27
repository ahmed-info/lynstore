<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Image;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $banners = Banner::all();
        return view('pages.banner.list',compact('banners'));
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
        $categories = Category::where('parent_id','<>',0)->orWhere('parent_id','<>',null)->get();
        $brands = Brand::all();
        $products = Product::all();
        return view('pages.banner.create',compact('categories','brands','products'));
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'title_en'=>'nullable',
            'title_ar'=>'nullable',
            'link'=>'required',
            'status'=>'required',
            'expireBanner'=>'date',
            'discountPercentage'=>'nullable|integer|min:0|max:100',
            'discountAmount'=>'nullable|integer',
            'product_id'=>'nullable',
            'brand_id'=>'nullable',
            'category_id'=>'nullable'
          ]);
          $banner = new Banner;
         //image
        if($request->file('image')){
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/banner",$filename); //move to file
            $banner->image = 'banner'.'/'.$filename;
         }

         $banner->title_en = $request->title_en;
         $banner->title_ar = $request->title_ar;
         $banner->link = $request->link;
         $banner->status = $request->status;
         $banner->expireBanner = $request->expireBanner;
         $banner->discountPercentage = $request->discountPercentage;
         $banner->discountAmount = $request->discountAmount;
         $banner->product_id = $request->product_id;
         $banner->brand_id = $request->brand_id;
         $banner->category_id = $request->category_id;
         $banner->save();
         return redirect()->route('dashboard.banners.list')->with('status', "banner created successfully");

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
        $banner = Banner::find($id);
        $categories = Category::where('parent_id','<>',0)->orWhere('parent_id','<>',null)->get();
        $brands = Brand::all();
        $products = Product::all();
        return view('pages.banner.edit', compact('banner','categories','brands','products'));
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'title_en'=>'nullable',
            'title_ar'=>'nullable',
            'link'=>'required',
            'status'=>'required',
            'expireBanner'=>'date',
            'discountPercentage'=>'nullable|integer|min:0|max:100',
            'discountAmount'=>'nullable|integer',
            'product_id'=>'nullable',
            'brand_id'=>'nullable',
            'category_id'=>'nullable'
          ]);
          $banner = Banner::find($id);
         //image
         if($request->file('image')){
            $destination = 'images/'. $banner->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/banner",$filename); //move to file
            $banner->image = 'banner'.'/'.$filename;
         }

         $banner->title_en = $request->title_en;
         $banner->title_ar = $request->title_ar;
         $banner->link = $request->link;
         $banner->status = $request->status;
         $banner->expireBanner = $request->expireBanner;
         $banner->discountPercentage = $request->discountPercentage;
        $banner->discountAmount = $request->discountAmount;
        $banner->product_id = $request->product_id;
        $banner->brand_id = $request->brand_id;
        $banner->category_id = $request->category_id;
         $banner->update();
         return redirect()->route('dashboard.banners.list')->with('status', "banner updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        $destination = 'images/'. $banner->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $banner->delete();
        return redirect()->route('dashboard.banners.list')->with('status','Banner Deleted Successfully');
    }
}
