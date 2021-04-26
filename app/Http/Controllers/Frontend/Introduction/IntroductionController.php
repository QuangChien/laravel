<?php

namespace App\Http\Controllers\Frontend\Introduction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroductionController extends Controller
{
    public function index(){
        return view('frontend.introduction.introduction');
    }

}
