<?php

namespace App\Http\Controllers\Site\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Carbon\Carbon;




class CartController extends Controller
{
    //
    public function cart(Request $request) {
        $data["cart"] = Cart::content();
        $data["priceTotal"] = Cart::priceTotal();
        $request->session()->put("cartNotify", Cart::count());
        return view("frontend/cart/cart", $data);
    }
    public function addToCart(Request $request) {
        $qty = $request->quantity? $request->quantity: 1;
        $product = Product::find($request->id);
        Cart::add([
            "id"=>$product->id,
            "name"=>$product->name,
            "price"=>$product->price,
            "qty"=>$qty,
            "weight"=>0,
            "options"=>["code"=>$product->code, "image"=>$product->image]
        ]);
        // dd(Cart::content());
        return redirect("/gio-hang");
    }
    public function updateCart(Request $request) {
        Cart::update($request->rowId, $request->qty);
        return "update";
    }
    public function deleteCart(Request $request) {
        Cart::remove($request->rowId);
        return "deleted";
    }
    public function checkout() {
        $data["cart"] = Cart::content();
        $data["priceTotal"] = Cart::priceTotal();
        return view("frontend/cart/checkout", $data);
    }
    public function payment(Request $request) {
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->total = Cart::priceTotal();
        $order->state = 0;
        $order->save();
        $cart = Cart::content();
        foreach($cart as $product){
            $orderProduct = new OrderProduct();
            $orderProduct->name = $product->name;
            $orderProduct->quantity = $product->qty;
            $orderProduct->price = $product->price;
            $orderProduct->code = $product->options->code;
            $orderProduct->image = $product->options->image;
            $orderProduct->orders_id = $order->id;
            $orderProduct->save();


        }
        return redirect("/gio-hang/hoan-thanh/".$order->id);
    }
    public function complete($id) {
        $data["order"] = Order::find($id);
        $data["orderProduct"]  = OrderProduct::where("orders_id", $id)
        ->get()
        ->toArray();
       $data["count"] = 0;
       $data["purchaseTime"] = Carbon::now("Asia/Bangkok");
        return view("frontend/cart/complete", $data);
    }
}
