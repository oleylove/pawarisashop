<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Vote;
use Illuminate\Http\Request;
use App\Product;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Auth;
Date::setLocale('th');

class VoteController extends Controller
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
        //     $vote = Vote::where('user_id', 'LIKE', "%$keyword%")
        //         ->orWhere('prod_id', 'LIKE', "%$keyword%")
        //         ->orWhere('vote', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $vote = Vote::latest()->paginate($perPage);
        // }

        // return view('vote.index', compact('vote'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('vote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($id , $score)
    {
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $vote_ck = Vote::where('user_id',Auth::id())->where('prod_id',$id)->first();
        $product = Product::findOrFail($id);

        if($vote_ck){

            $score_old = $product->score - $vote_ck->score;
            $score_new =   $score_old + $score;
            $rating_new = round(($score_new/$product->vote),1);

            Product::where('id',$id)->update([
                'score' => $score_new,
                'rating' => $rating_new
            ]);
            Vote::where('id',$vote_ck->id)->update([
                'score' => $score,
                'updated_at' => Date::now()
            ]);

        }else{

            $vote =  $product->vote + 1;
            $score_new = $product->score + $score;
            $rating_new = round(($score_new/$vote),1);

            Product::where('id',$id)->update([
                'vote' => $vote,
                'score' => $score_new,
                'rating' => $rating_new,
            ]);
            Vote::create([
                'user_id' => Auth::id(),
                'prod_id' => $id,
                'score' => $score,
                'created_at' => Date::now()
            ]);
        }
        $data = Product::findOrFail($id);
        return response()->json($data);
        //return response()->json_encode(array('vote' => $product->vote, 'rating' => $product->rating, 'score' => $product->score));
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
        // $vote = Vote::findOrFail($id);

        // return view('vote.show', compact('vote'));
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
        // $vote = Vote::findOrFail($id);

        // return view('vote.edit', compact('vote'));
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

        // $requestData = $request->all();

        // $vote = Vote::findOrFail($id);
        // $vote->update($requestData);

        // return redirect('vote')->with('flash_message', 'Vote updated!');
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
        // Vote::destroy($id);

        // return redirect('vote')->with('flash_message', 'Vote deleted!');
    }
}
