<?php

namespace App\Http\Controllers\Site\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function shop() {
        $products = Product::orderBy("id", "DESC")->paginate(6);
        $categories = Category::all();
        return view("frontend/product/shop", ["products"=>$products, "categories"=>$categories]);
    }
    public function filter(Request $request) {
        $start = $request->start;
        $end = $request->end;
        $products = Product::whereBetween("price", [$start, $end])
            ->orderBy("id", "DESC")
            ->paginate(6);
        $categories = Category::all();
        return view("frontend/product/shop", ["products"=>$products, "categories"=>$categories]);
    }
    public function details($slug) {
        // dd($slug);
        $product = Product::where("slug", $slug)
        ->get()
        ->toArray();

        $products = Product::where("slug", "<>", $slug)
        ->limit(4)
        ->orderBy("id", "DESC")
        ->get()
        ->toArray();
        return view("frontend/product/details", ["product"=>$product[0], "products"=>$products]);
    }

}
