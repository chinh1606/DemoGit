<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLogin() {
        return view("backend/login");
    }
    public function postLogin(LoginRequest $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect("/admin");
        }else{
            return redirect()->back()->withErrors("Taì khoản không hợp lệ!");
        }
    }
}
