<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index() {
        return view("backend/categories/category");
    }
    public function edit() {
        $categories = Category::all()->toArray();
        // dd($categories);
        return view("backend/categories/editcategory", ["categories"=>$categories]);
    }
}
