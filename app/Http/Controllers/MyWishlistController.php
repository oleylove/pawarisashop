<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wishlist;
use App\Like;
use App\Product;
use Jenssegers\Date\Date;
Date::setLocale('th');

class MyWishlistController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $perPage = 10;
        $wishlist = Wishlist::where('user_id',Auth::id())->latest()->paginate($perPage);

        return view('wishlist', compact('wishlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData['prod_id'] = $request->get('prod_id');
        $requestData['user_id'] = Auth::id();
        if (!empty($request->get('prod_id'))) {

            $wishlist = Wishlist::where('user_id',Auth::id())->where('prod_id',$requestData['prod_id'])->first();

            if (!$wishlist) {

                Wishlist::create($requestData);
            }

            return response()->json(['success'=>'เพิ่มสินที่คุณสนใจค้าเรียบร้อยแล้วคะ!']);

        }else{

            return redirect('error-page-404');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        Wishlist::destroy($id);

        return redirect()->back()->with('alert', 'ลบสินค้าออกจากสิ่งที่คุณสนใจเรียบร้อบแล้วคะ');
    }

    public function product_likes($id )
    {
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        if(!empty($id)){
            $like = Like::where('user_id',Auth::id())->where('prod_id', $id)->first();
            if($like){

                Like::where('id',$like->id)
                    ->update([
                        'updated_at' => Date::now()
                    ]);
                return response()->json(['success'=>'ขอบคุณที่ถูกใจสินค้าของเราคะ!']);

            }else{

                Product::where('id',$id)->increment('likes', 1);
                Like::create([
                    'user_id' => Auth::id(),
                    'prod_id' => $id,
                    'likes' => 1,
                    'created_at' => Date::now()
                ]);
                return response()->json(['success'=>'ขอบคุณที่ถูกใจสินค้าของเราคะ!']);

            }
        }
    }
}
