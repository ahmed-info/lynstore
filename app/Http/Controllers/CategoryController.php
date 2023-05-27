<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB as FacadesDB;
//use Illuminate\Support\Facades\DB as FacadesDB;
//use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    protected $appends = [
        'getParentsTree'
    ];
    public static function getParentsTree($category, $title)
    {
        if($category->parent_id == 0){
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->{'title_'.app()->getLocale()} .' > '.$title;
        return CategoryController::getParentsTree($parent, $title);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mainCategories = Category::where('parent',0)->orWhere('parent',null)->get();
        //dd($mainCategories);
        //return view('layouts.user-layout', compact('mainCategories'));

    }

    public function list()
    {
        $categories = FacadesDB::table('categories')->orderBy('id', 'desc')->get();
        $data = Category::all();
        //return $categories;
        return view('pages.category.list', compact('categories','data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =Category::all();
        //dd($data);
        return view('pages.category.create', [
            'data'=>$data
        ]);
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
            'parent_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
         ]);
         $category = new Category;
         $category->title_en = $request->title_en;
         $category->title_ar = $request->title_ar;
         $category->parent_id = $request->parent_id;
         $category->activeOrNot = true;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/category",$filename); //move to file
            $category->image = 'category'.'/'.$filename;
         }
          $category->save();
         return redirect()->route('dashboard.mainCategories.list')->with('success', "service updated successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return "category  ". $id;
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $brands = Brand::all();
        $category = Category::find($id);
        //dd($category);
        return view('category.show', compact('maincategories', 'subcategories','brands','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);

        $datalist =Category::all();
        //dd($data);
        return view('pages.category.edit', compact('datalist','data'));
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
            'parent_id' =>'required',
         ]);
         $category = Category::find($id);
         $category->title_en = $request->title_en;
         $category->title_ar = $request->title_ar;
         $category->parent_id = $request->parent_id;
         if($request->file('image')){
            $destination = 'images/'. $category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/category",$filename); //move to file
            $category->image = 'category'.'/'.$filename;
         }
          $category->save();
         return redirect()->route('dashboard.mainCategories.list')->with('status', "category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = 'images/'. $category->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $category->delete();

        return redirect()->route('dashboard.mainCategories.list')->with('status','Category Deleted Successfully');
    }
}
