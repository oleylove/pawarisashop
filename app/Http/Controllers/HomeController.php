<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Config;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {

            $config = Config::first();
            $products = Product::where('status','ขาย')->limit(12)->latest()->get();
            $popular = Product::where('status','ขาย')->orderBy('sold', 'desc')->limit(12)->get();
            $featured = Product::where('status','ขาย')->orderBy('rating', 'desc')->limit(12)->get();
            $latest = Product::where('status','ขาย')->where('hot', 1)->limit(12)->latest()->get();

            if (Auth::user()) {
                return view('welcome', compact('config','products','popular','featured','latest'));
            }else{
                return redirect('/');
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

}
