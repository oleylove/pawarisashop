<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Review;
use App\Vote;

use Illuminate\Http\Request;

class ReviewController extends Controller
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
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $review = Review::where('user_id', 'LIKE', "%$keyword%")
        //         ->orWhere('prod_id', 'LIKE', "%$keyword%")
        //         ->orWhere('vote_id', 'LIKE', "%$keyword%")
        //         ->orWhere('comment', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $review = Review::latest()->paginate($perPage);
        // }

        // return view('review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('review.create');
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
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $requestData = $request->all();

        Review::create($requestData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // $review = Review::findOrFail($id);

        // return view('review.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // $review = Review::findOrFail($id);

        // return view('review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $requestData = $request->all();

        $review = Review::findOrFail($id);
        $review->update($requestData);

        return redirect('review')->with('flash_message', 'Review updated!');
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

        Review::destroy($id);

        return redirect('review')->with('flash_message', 'Review deleted!');
    }
}
