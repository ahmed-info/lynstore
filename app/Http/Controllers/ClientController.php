<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use App\Models\ShippingInfo;
use App\Models\OrderProduct;
use App\Http\Controllers\Auth;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $carts = Cart::where('user_id',1)->latest()->get();
        $brands = Brand::all();
        return view('userprofile.addToCart', compact('maincategories','subcategories','carts','brands'));
    }

    public function addToWishlist()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $wishlists = Wishlist::where('user_id',1)->latest()->get();
        $brands = Brand::all();
        return view('userprofile.addToWishlist', compact('maincategories','subcategories','wishlists','brands'));
    }
    public function addShippingAddress(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'nullable|numeric',
            'phone'=>'required|string',
            'address'=>'required|string',
         ]);
         $shippingInfo = new ShippingInfo;
         $shippingInfo->user_id = $request->user_id;
         $shippingInfo->phone = $request->phone;
         $shippingInfo->address = $request->address;
         $shippingInfo->save();
        //dd($request->all());
        return redirect()->route('checkout');

    }

    public function addShippingWishlist(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'nullable|numeric',
            'phone'=>'required|string',
            'address'=>'required|string',
         ]);
         $shippingInfo = new ShippingInfo;
         $shippingInfo->user_id = $request->user_id;
         $shippingInfo->phone = $request->phone;
         $shippingInfo->address = $request->address;
         $shippingInfo->save();
        //dd($request->all());
        return redirect()->route('checkoutWishlist');

    }
    public function placeOrder(Request $request)
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $carts = Cart::where('user_id',1)->latest()->get();
        $shippingAddress = ShippingInfo::where('user_id',1)->latest()->first();
        //dd($shippingAddress->phone);
        foreach($carts as $cart){
         $order = new Order;
         $order->user_id = 1;
         $order->phone = $shippingAddress->phone;
         $order->address = $shippingAddress->address;
         $order->product_id = $cart->product_id;
         $order->quantity = $cart->quantity;
         $order->totalPrice = $cart->price;
         $order->save();
         $id = $cart->id;

          //many to many
         $orders =Order::where('status','pending')->where('user_id',1)->latest()->get();
        $orderProduct = new OrderProduct;
         foreach($orders as $ind=> $order){

             $orderProduct->product_id = Product::where('id', $cart->product_id)->value('id');
             $orderProduct->order_id = $orders[$ind]->id;
             $orderProduct->save();
            }

         Cart::findOrFail($id)->delete();
        }


        ShippingInfo::where('user_id',1)->latest()->first()->delete();

        return redirect()->route('pendingOrders')->with('status', __('words.Your Order has been placed successfully'));
    }

    public function placeOrderWishlist(Request $request)
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $wishlists = Wishlist::where('user_id',1)->latest()->get();
        $shippingAddress = ShippingInfo::where('user_id',1)->latest()->first();
        //dd($shippingAddress->phone);
        foreach($wishlists as $wishlist){
         $order = new Order;
         $order->user_id = 1;
         $order->phone = $shippingAddress->phone;
         $order->address = $shippingAddress->address;
         $order->product_id = $wishlist->product_id;
         $order->quantity = $wishlist->quantity;
         $order->totalPrice = $wishlist->price;
         $order->save();
         $id = $wishlist->id;

          //many to many
         $orders =Order::where('status','pending')->where('user_id',1)->latest()->get();
        $orderProduct = new OrderProduct;
         foreach($orders as $ind=> $order){

             $orderProduct->product_id = Product::where('id', $wishlist->product_id)->value('id');
             $orderProduct->order_id = $orders[$ind]->id;
             $orderProduct->save();
            }

         //Cart::findOrFail($id)->delete();
        }


        ShippingInfo::where('user_id',1)->latest()->first()->delete();

        return redirect()->route('pendingOrders')->with('status', __('words.Your Order has been placed successfully'));
    }
    public function cancleOrder($id)
    {
        foreach($carts as $cart){
            Cart::findOrFail($cart->id)->delete();
        }
        $order = Order::find($id);
         $order->status = 'canceld';
        $order->update();
        return redirect()->route('main.home');

    }
    public function checkout()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $carts = Cart::where('user_id',1)->latest()->get();
        $shippingAddress = ShippingInfo::where('user_id',1)->latest()->first();
        $pendingOrders = Order::where('status','pending')->get();
        $brands = Brand::all();


        return view('userprofile.checkout', compact('maincategories','subcategories','carts', 'shippingAddress','pendingOrders','brands'));
    }
    public function checkoutWishlist()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $wishlists = Wishlist::where('user_id',1)->latest()->get();
        $shippingAddress = ShippingInfo::where('user_id',1)->latest()->first();
        $pendingOrders = Order::where('status','pending')->get();
        $brands = Brand::all();


        return view('userprofile.checkoutWishlist', compact('maincategories','subcategories','wishlists', 'shippingAddress','pendingOrders','brands'));
    }
    public function addProductToCart(Request $request,$id)
    {
        $this->validate($request,[
            'product_id'=>'nullable|numeric',
            'user_id'=>'nullable|numeric',
            'quantity'=>'nullable|numeric',
            'price'=>'nullable|numeric',
         ]);

        $productPrice = $request->price;
        $quantity = $request->quantity;
        $price = $productPrice * $quantity;
         //dd($request->all());
         $cart = new Cart;
         $cart->product_id= $request->product_id;
         $cart->user_id= 1;
         $cart->quantity = $request->quantity;
         $cart->price = $price;
         $cart->save();
         return redirect()->route('addToCart')->with('status', __('words.add to product successfully'));
    }

    public function addProductToWishlist(Request $request,$id)
    {
        $this->validate($request,[
            'product_id'=>'nullable|numeric',
            'user_id'=>'nullable|numeric',
            'quantity'=>'nullable|numeric',
            'price'=>'nullable|numeric',
         ]);

        $productPrice = $request->price;
        $quantity = $request->quantity;
        $price = $productPrice * $quantity;
         //dd($request->all());
         $whishlist = new Wishlist;
         $whishlist->product_id= $request->product_id;
         $whishlist->user_id= 1;
         $whishlist->quantity = $request->quantity;
         $whishlist->price = $price;
         $whishlist->save();
         return redirect()->route('addToWishlist')->with('status', __('words.add to product successfully'));
    }
    public function pendingOrders(){
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $orderProduct = OrderProduct::all();
        $pendingOrders = Order::where('status','pending')->latest()->get();
        //$orders = Order::latest()->get();
        $carts = Cart::where('user_id',1)->latest()->get();
        $brands = Brand::all();


        return view('userprofile.pendingOrders', compact('maincategories','subcategories','brands','pendingOrders','carts'));
    }
    public function history()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        return view('userprofile.history', compact('maincategories','subcategories'));
    }
    public function userProfile()
    {
        $allcategories = Category::all();
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        return view('userProfile.userProfileTemplate', compact('maincategories','subcategories'));
    }
    public function dashboardUser()
    {
        $allcategories = Category::all();
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        return view('userProfile.dashboardUser', compact('maincategories','subcategories'));
    }
    public function productdetails($id)
    {
        $allcategories = Category::all();
        $brands = Brand::all();
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $productDetail = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id',$id)->where('id','!=',$id)->latest()->get();

        return view('main.productDetails', compact('maincategories','subcategories','productDetail','relatedProducts','brands'));
    }

    public function shippingAddress()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $brands = Brand::all();
        return view('userprofile.shippingAddress', compact('maincategories','subcategories','brands'));
    }

    public function shippingWishlist()
    {
        $maincategories = Category::select('id','title_en','title_ar','image')->where('parent_id',0)->orWhere('parent_id',null)->get();
        $subcategories = Category::select('parent_id','title_en','title_ar','image')->where('parent_id','<>',0)->orderBy('parent_id','asc')->get();
        $brands = Brand::all();
        return view('userprofile.shippingWishlist', compact('maincategories','subcategories','brands'));
    }
    public function detail()
    {
        return view('main.product_detail');
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
        //
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
        $cart = Cart::find($id);
        return view('cart.edit', compact('cart'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('addToCart')->with('status','Remove cart Item Deleted Successfully');
    }

    public function destroyWishlist($id)
    {
        $whishlist = Wishlist::find($id);
        $whishlist->delete();
        return redirect()->route('addToWishlist')->with('status','Remove Wishlist Item Deleted Successfully');
    }

}
