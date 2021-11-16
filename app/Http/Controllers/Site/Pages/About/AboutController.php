<?php

namespace App\Http\Controllers\Site\Pages\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('site.about.index');
    }
}
