<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'lastname', 'email', 'password'
    ];
    protected $table = 'tbl_user';
}
