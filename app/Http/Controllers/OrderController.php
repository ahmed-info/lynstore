<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $orderProduct = OrderProduct::all();
        $pendingOrders = Order::where('status','pending')->latest()->get();
        //$orders = Order::latest()->get();
        $carts = Cart::where('user_id',1)->latest()->get();


        return view('pages.order.list',compact('pendingOrders','orderProduct','carts'));
    }

    public function AllOrders()
    {
        $orders = Order::latest()->get();
        return view('pages.order.AllOrders',compact('orders'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $orderId, int $productId)
    {
         $orderProduct = OrderProduct::where('order_id',$orderId)
                                        ->where('product_id',$productId )->first();
$orders = Order::where('id',$orderProduct->order_id)->get();

            foreach($orders as $index=> $order){
                foreach($order->products as $ind=> $product){
                    if($product->id == $orderProduct->product_id && $order->id == $orderProduct->order_id){
                        $order->status = 'complete';
                        $order->update();
                        $prodId = $product->id;
                        $product->quantity = $product->quantity - $order->quantity;
                        $product->salesCounter = $product->salesCounter + $order->quantity;
                        $product->update();

                    }
                }

            }

         return redirect()->route('dashboard.orders.list')->with('status', "Approve Order successfully");
    }

}
