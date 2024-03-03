<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($slug) {
        $categories = Category::all();
        $products = Category::where("slug", $slug)
            ->first()
            ->product()
            ->orderBy("id", "DESC")
            ->paginate(6);
        return view("frontend/product/shop", ["categories"=>$categories, "products"=>$products]);
    }

}
