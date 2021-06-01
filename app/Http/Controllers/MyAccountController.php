<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;

class MyAccountController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $profile = Profile::where('user_id', Auth::id())->latest()->get();
            return view('account', compact('profile'));
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (empty($request->id)) {

                $requestData = $request->all();
                $requestData['user_id'] = Auth::id();
                Profile::create($requestData);
            } else {
                Profile::where('id',$request->id)
                    ->update([
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'address' => $request->address
                ]);
            }
            return redirect('myaccount')->with('flash_message', 'Order added!');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = Profile::findOrFail($id);
            return response()->json($data);
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $profiles = Profile::where('user_id', Auth::id())->latest()->get();
            foreach($profiles as $item){
                if ($item->id == $id) {
                    Profile::where('id',$id)->update(['status' => 'จัดส่ง']);
                } else {
                    Profile::where('id', $item->id)->update(['status' => NULL]);
                }
            }
            return redirect('myaccount')->with('flash_message', 'Order updated!');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Profile::destroy($id);
            return redirect('myaccount')->with('flash_message', 'Order deleted!');
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
