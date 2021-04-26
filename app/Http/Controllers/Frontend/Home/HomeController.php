<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{   
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    public function index(){
        $products = $this->product->offset(0)->limit(4)->get();
        return view('frontend.index',compact('products'));
    }


}
