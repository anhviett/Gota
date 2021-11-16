<?php

namespace App\Http\Controllers\Site\Pages\Question;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        return view('site.questions.index');
    }
}
