<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\AddProductRequest;
use App\Slug\Slug;
use App\Slug\Facade\SlugFacade;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    //
    public function index() {
            $products = Product::orderBy("id", "DESC")
                ->paginate(5);
        return view("backend/products/listproduct", ["products"=>$products]);
    }
    public function create() {
        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories"=>$categories]);
    }
    public function store(AddProductRequest $request) {
        if($request->hasFile("image")) {
            $slug = Slug::getSlug($request->name);

            $file = $request->image;
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $slug.".".$fileExtension;
            $file->move("uploads", $fileName);
            $product = new Product();
            $product->name = $request->name;
            $product->code = $request->code;
            $product->info = $request->info;
            $product->categories_id = $request->categories_id;
            $product->describer = $request->describer;
            $product->price = $request->price;
            $product->featured = $request->featured;
            $product->state = $request->state;
            $product->slug = $slug;
            $product->image = $fileName;
            $product->save();
        }
        $request->session()->flash("alert", "Đã thêm thành công!");
        return redirect("/admin/product");

        // return view("backend/products/addproduct");
    }
    public function edit(Request $request) {
        $id = $request->id;
        $categories = Category::all();
        $product = Product::find($id)->toArray();
        // dd($product);
        return view("backend/products/editproduct", ["product"=>$product, "categories"=>$categories]);
    }
    public function update(EditProductRequest $request) {
        $id = $request->id;
        $slug = Slug::getSlug($request->name);
        $product = Product::find($id);

        $product->name = $request->name;
            $product->code = $request->code;
            $product->info = $request->info;
            $product->categories_id = $request->categories_id;
            $product->describer = $request->describer;
            $product->price = $request->price;
            $product->featured = $request->featured;
            $product->state = $request->state;
            $product->slug = $slug;

            if($request->hasFile("image")) {
                $file = $request->image;
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = $slug.".".$fileExtension;
                $file->move("uploads", $fileName);
                $product->image = $fileName;
            }
            $product->save();
            $request->session()->flash("alert", "Đã sửa thành công!");
            return redirect("/admin/product");

        return view("backend/products/editproduct");
    }
    public function delete(Request $request) {
        $id = $request->id;
        $product = Product::find($id);
        $product->delete();
        return redirect("/admin/product");
        // return view("backend/products/editproduct");
    }
}
