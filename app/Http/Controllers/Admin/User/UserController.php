<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::orderBy("level", "asc")
            ->paginate(3);
        return view("backend/users/listuser", ["users"=>$users]);
    }
    public function create() {
        return view("backend/users/adduser");
    }
    public function edit() {
        return view("backend/users/edituser");
    }
    public function delete() {
        return "delete User";
    }
    public function update() {
        return view("backend/users/listuser");
    }
}
