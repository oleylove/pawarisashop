<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $keyword = $request->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $users = User::where('id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::latest()->paginate($perPage);
        }
        return view('profile.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //return view('profile.create');
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

        // $requestData = $request->all();

        // Profile::create($requestData);

        // return redirect('profile')->with('flash_message', 'Profile added!');
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
        try {


        } catch (Exception $ex) {
            return $ex->getMessage();
        }

        $profile = Profile::where('user_id',$id)->latest()->get();
        $users = User::findOrFail($id);

        return view('profile.show', compact('profile','users'));
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
        // $profile = Profile::findOrFail($id);

        // return view('profile.edit', compact('profile'));
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

        // $profile = Profile::findOrFail($id);
        // $profile->update($requestData);

        // return redirect('profile')->with('flash_message', 'Profile updated!');
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
        // $profile = Profile::where('user_id',$id)->get();
        // User::destroy($id);
        // foreach($profile as $item){
        //     if ($item->user_id == $id) {
        //         Profile::destroy($item->id);
        //     }
        // }
        // return redirect('profile')->with('flash_message', 'Profile deleted!');
    }
}
