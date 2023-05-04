<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Color;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('pages.product.list',compact('products'));
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
        $data =Category::all();
        $brands =Brand::all();
        $suppliers =Supplier::all();
        $colors =Color::all();
        $categories = Category::where('parent_id','<>',0)->orWhere('parent_id','<>',null)->get();

        return view('pages.product.create', [
            'data'=>$data,
            'suppliers'=>$suppliers,
            'categories'=>$categories,
            'brands'=>$brands,
            'colors'=>$colors
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
            // 'image1'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image1' => 'mimes:png,jpg',
            'image2' => 'mimes:png,jpg',
            'image3' => 'mimes:png,jpg',
            'image4' => 'mimes:png,jpg',
            'image5' => 'mimes:png,jpg',

             'showIsHome' => 'nullable',
            'selectForYou' => 'nullable|boolean:0,1,true,false',
            'description_en'=>'nullable|string',
            'description_ar'=>'nullable|string',
            'brand_id'=>'nullable|numeric',
            'capacity'=>'nullable|string',
            'unit'=>'nullable|string',
            'quantity'=>'nullable|numeric',
            'supplier_id'=>'nullable|numeric',
            'deliveryTime'=>'nullable|string',
            'sku'=>'nullable|string',
            'barcode'=>'nullable|string',
            'mainPrice'=>'nullable|numeric',
            'mainPriceDiscount'=>'nullable|numeric',
            'category_id'=>'required|numeric',
         ]);


         //dd($request->all());
         $product = new Product;
         $product->title_en = $request->title_en;
         $product->title_ar = $request->title_ar;
         $product->showIsHome = $request->showIsHome== "1"? 1:0;
         $product->selectForYou = $request->selectForYou == "1" ? 1 : 0;
          //image 1
        if($request->file('image1')){
            $image1 = $request->file('image1');
            $filename = time().'_'.$image1->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image1->move("images/product",$filename); //move to file
            $product->image1 = 'product'.'/'.$filename;
        }
         // image 2
         if($request->file('image2')){
            $image2 = $request->file('image2');
            $filename = time().'_'.$image2->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image2->move("images/product",$filename); //move to file
            $product->image2 = 'product'.'/'.$filename;
         }
          // image 3
          if($request->file('image3')){
            $image3 = $request->file('image3');
            $filename = time().'_'.$image3->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image3->move("images/product",$filename); //move to file
            $product->image3 = 'product'.'/'.$filename;
         }
         // image 4
         if($request->file('image4')){
            $image4 = $request->file('image4');
            $filename = time().'_'.$image4->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image4->move("images/product",$filename); //move to file
            $product->image4 = 'product'.'/'.$filename;
         }
         // image 5
         if($request->file('image5')){
            $image5 = $request->file('image5');
            $filename = time().'_'.$image5->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image5->move("images/product",$filename); //move to file
            $product->image5 = 'product'.'/'.$filename;
         }
         $product->description_en= $request->description_en;
         $product->description_ar= $request->description_ar;
         $product->brand_id= $request->brand_id;
         $product->capacity= $request->capacity;
         $product->unit= $request->unit;
         $product->quantity= $request->quantity;
         $product->supplier_id= $request->supplier_id;
         $product->deliveryTime= $request->deliveryTime;
         $product->sku= $request->sku;
         $product->barcode= $request->barcode;
         $product->mainPrice= $request->mainPrice;
         $product->mainPriceDiscount= $request->mainPriceDiscount;
         $product->category_id= $request->category_id;
         //dd($request->all());
         if($request->colors){
            foreach($request->colors as $key=> $color){
                $product->productColor()->create([
                    'product_id'=>$product->id,
                    'color_id'=>$color,
                    'quantity'=>$request->colorQuantity[$key] ?? 0,
                ]);
            }
         }
          $product->save();
         return redirect()->route('dashboard.products.list')->with('status', "product created successfully");

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
        $suppliers = Supplier::all();
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        $product_color = $product->productColor->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();
        $productcolors = ProductColor::all();
        //dd($colors);
        return view('pages.product.edit', compact('product','suppliers', 'categories','brands','productcolors','colors'));
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
            'image1'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
            'image1' => 'mimes:png,PNG,jpg',
            'image2' => 'mimes:png,PNG,jpg',
            'image3' => 'mimes:png,PNG,jpg',
            'image4' => 'mimes:png,PNG,jpg',
            'image5' => 'mimes:png,PNG,jpg',
             'showIsHome' => 'nullable',
            'selectForYou' => 'nullable|boolean:0,1,true,false',
            'description_en'=>'nullable|string',
            'description_ar'=>'nullable|string',
            'brand_id'=>'nullable|numeric',
            'capacity'=>'nullable|string',
            'unit'=>'nullable|string',
            'quantity'=>'nullable|numeric',
            'supplier_id'=>'nullable|numeric',
            'deliveryTime'=>'nullable|string',
            'sku'=>'nullable|string',
            'barcode'=>'nullable|string',
            'mainPrice'=>'nullable|numeric',
            'mainPriceDiscount'=>'nullable|numeric',
            'category_id'=>'nullable|numeric',

         ]);

         //dd($request->all());
         $product = Product::find($id);
         $product->title_en = $request->title_en;
         $product->title_ar = $request->title_ar;
         $product->showIsHome = $request->showIsHome== "1"? 1:0;
         $product->selectForYou = $request->selectForYou == "1" ? 1 : 0;

         if($request->file('image1')){
            $destination1 = 'images/'. $product->image1;
            if(File::exists($destination1)){
                File::delete($destination1);
            }
            $image1 = $request->file('image1');
            $filename = time().'_'.$image1->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imagepath = $image1->move("images/product",$filename); //move to file
            $product->image1 = 'product'.'/'.$filename;
         }

         if($request->file('image2')){
            $destination2 = 'images/'. $product->image2;
            if(File::exists($destination2)){
                File::delete($destination2);
            }
            $image2 = $request->file('image2');
            $filename = time().'_'.$image2->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imagepath = $image2->move("images/product",$filename); //move to file
            $product->image2 = 'product'.'/'.$filename;
         }

         if($request->file('image3')){
            $destination3 = 'images/'. $product->image3;
            if(File::exists($destination3)){
                File::delete($destination3);
            }
            $image3 = $request->file('image3');
            $filename = time().'_'.$image3->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imagepath = $image3->move("images/product",$filename); //move to file
            $product->image3 = 'product'.'/'.$filename;
         }

         if($request->file('image4')){
            $destination4 = 'images/'. $product->image4;
            if(File::exists($destination4)){
                File::delete($destination4);
            }
            $image4 = $request->file('image4');
            $filename = time().'_'.$image4->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imagepath = $image4->move("images/product",$filename); //move to file
            $product->image4 = 'product'.'/'.$filename;
         }

         if($request->file('image5')){
            $destination5 = 'images/'. $product->image5;
            if(File::exists($destination5)){
                File::delete($destination5);
            }
            $image5 = $request->file('image5');
            $filename = time().'_'.$image5->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $imagepath = $image5->move("images/product",$filename); //move to file
            $product->image5 = 'product'.'/'.$filename;
         }

         $product->description_en= $request->description_en;
         $product->description_ar= $request->description_ar;
         $product->brand_id= $request->brand_id;
         $product->capacity= $request->capacity;
         $product->unit= $request->unit;
         $product->quantity= $request->quantity;
         $product->supplier_id= $request->supplier_id;
         $product->deliveryTime= $request->deliveryTime;
         $product->sku= $request->sku;
         $product->barcode= $request->barcode;
         $product->mainPrice= $request->mainPrice;
         $product->mainPriceDiscount= $request->mainPriceDiscount;
         $product->category_id= $request->category_id;
         //dd($request->all());
         $product->update();
        return redirect()->route('dashboard.products.list')->with('status', "product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return "delete product";
        $product = Product::find($id);

        $destination1 = 'images/'. $product->image1;
        if(File::exists($destination1)){
            File::delete($destination1);
        }

        $destination2 = 'images/'. $product->image2;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $destination3 = 'images/'. $product->image3;
        if(File::exists($destination3)){
            File::delete($destination3);
        }
        $destination4 = 'images/'. $product->image4;
        if(File::exists($destination4)){
            File::delete($destination4);
        }
        $destination5 = 'images/'. $product->image5;
        if(File::exists($destination5)){
            File::delete($destination5);
        }
        $product->delete();
        return redirect()->route('dashboard.products.list')->with('status','Product Deleted Successfully');
    }
}
