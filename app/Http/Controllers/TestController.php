<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Test;
use App\Models\User;
use App\Models\Detail;
use App\Models\Category;
use App\Trieu\Trieu;
class TestController extends Controller
{
    //
    public function test(Request $request) {
        
        // dd(1000);
        // $categories = Category::all()->toArray();
        // dd($categories);
        // function showCategory($categories, $parent, $char) {
        //     foreach($categories as $category) {
        //         if($category["parent"]==$parent) {
        //             echo $char.$category["name"]."<br/>";
        //             showCategory($categories, $category["id"], $char."|--");
        //         }
        //     }
        // }
        // showCategory($categories, 0, "");
        // return view("backend/test1");
        // $test = Category::find(1)->product->toArray();
        // $test = User::find(3)->get()->toAray();
        // dd($test);
        // $data = DB::table("categories")
        //     ->get();
        // dd($data);
        // $product = DB::table("products")
        // ->select("products.name as product_name", "price", "categories.name as categories_name")
        // ->join("categories", "products.categories_id", "=", "categories.id")
        // ->get()
        // ->all();
        // dd($product);
        // $categories = Category::all()->toArray();
        // dd($categories);
        // return view("test1", ["categories"=>$categories]);

    }

    public function test1(Request $request) {
        // $request->session()->forget("name"); ==> xóa 1 seesion
        // $request->session()->forget(["age", "sdt"]); ==> xóa nhiều hơn 1 session ta dùng mảng
        dd($request->session()->all());
        // dd($request->session()->get("age"));

        // if(dd($request->session()->has("age"))) {
        //     dd("none");
        // }
        return view("backend/test");
    }
    public function test2(Request $request) {
        // dd("ok");
        // $email=$request->email;
        // $password=$request->password;
        // dd($email."-".$password);
        // dd($request->all());
        $rules = [
            "email" => "required|email",
            "password" => "required|max:6|min:3"
        ];
        $message =[
            "email.email" => "Email phai la email",
            "email.required" => "Email khong duoc de trong",
            "password.required" => "password khong duoc de trong",
            "password.min" => "password toi thieu 3 ki tu",
            "password.max" => "password toi da 6 ki tu"
        ];
        $request->validate($rules, $message);
        if($request->email == "vietpro.edu.vn@gmail.com" && $request->password == "123456"){
            return redirect("/admin");
        }
        else{
            dd("fail");
        }
    }
}
