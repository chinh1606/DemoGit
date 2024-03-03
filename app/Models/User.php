<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        "id",
        "fullname",
        "email",
        "phone",
        "password",
        "address",
        "level",
    ];
    protected $hidden = [
        "id",
        "password",
        "level",
    ];
    public function detail () {
        return $this->hasOne(Detail::class, "users_id", "id");
    }
}
