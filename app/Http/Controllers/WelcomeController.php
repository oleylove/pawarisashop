<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Config;
use App\Product;
use App\Review;
use App\Vote;

use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        try {

            $config = Config::first();
            $products = Product::where('status','ขาย')->limit(12)->latest()->get();
            $popular = Product::where('status','ขาย')->orderBy('sold', 'desc')->limit(12)->get();
            $featured = Product::where('status','ขาย')->orderBy('rating', 'desc')->limit(12)->get();
            $latest = Product::where('status','ขาย')->where('hot', 1)->limit(12)->latest()->get();

            if (Auth::user()) {
                return redirect('/home');
            }else{
                return view('welcome', compact('config','products','popular','featured','latest'));
            }

        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function products()
    {
        try {
            $perPage = 15;
            $products = Product::where('status','ขาย')->latest()->paginate($perPage);
            $recently = Product::where('status','ขาย')->orderBy('view','desc')->limit(3)->latest()->get();
            $popular = Product::where('status','ขาย')->orderBy('sold','desc')->limit(3)->get();
            return view('product', compact('products','recently','popular'));

        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function product_detail(Request $request)
    {
        try {
            $id = $request->get('search');

            if(!empty($id)){

                $product = Product::where('status','ขาย')->where('id', $id)->first();
                if ($product) {
                    $related = Product::where('status','ขาย')->limit(8)->latest()->get();
                    $review = Review::where('prod_id',$id)->latest()->get();
                    $vote_ck = Vote::where('user_id',Auth::id())->where('prod_id',$id)->first();
                    Product::where('id',$id)->increment('view', 1);

                    return view('product-detail', compact('product','related','review','vote_ck'));

                } else {

                    return redirect('error-page-404');
                }
            }


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function product_model($id)
    {
        try {

            $data = Product::findOrFail($id);
            Product::where('id',$id)->increment('view', 1);
            return response()->json($data);

        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function contact_shop()
    {
        try {
            $config = Config::first();
            return view('contact',compact('config'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

}
