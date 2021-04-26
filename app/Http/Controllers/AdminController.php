<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;


class AdminController extends Controller
{   
    public function home(){
        $comments = Comment::all();
        $contacts = Contact::all();
        $customers = Customer::all();
        $orders = Order::all();
        $users = User::all();
        $products = Product::all();
        $productImages = ProductImage::all();

        return view('backend.home.index',compact('comments','contacts','customers','orders','productImages','products','users'));
    }

    public function login(){
        return view('login.login');
    }
 

    // public function logout(){
    //     Auth::logout();
    //     return redirect()->route('login');
    // }

    public function postLogin(Request $request){
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt(
            ['email' => $request->email, 'password' => $request->password
        ], $remember)) {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->with('error_user', 'Tài khoản hoặc mật khẩu không đúng!')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
