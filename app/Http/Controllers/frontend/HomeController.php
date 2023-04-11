<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    public function index()
    {
        return view('main.home2');
        return "my index";
    }

    public function scanners()
    {
        return view('lyn.index');
    }

    public function carousel()
    {
        return view('lyn.carousel');
    }
    public function navbar()
    {
        return view('lyn.navbar');

    }
    public function home()
    {
        $allcategories = Category::all();
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        foreach($maincategories as  $maincategory){
           foreach($subcategories as $subcategory){
                if($subcategory->parent_id == $maincategory->id){
                    //  echo  $subcategory->title_en.'<br>';
                }
           }
           //echo "=============================<br/>";

        }
        $data =Category::all();
        $brands = Brand::all();

        return view('main.home', compact('data','maincategories','subcategories', 'brands'));

    }
}
