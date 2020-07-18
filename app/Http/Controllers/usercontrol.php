<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;

use App\Http\Requests;
use App\Http\Requests\userrequest;
use App\User;
use DB;

class usercontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::all();
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userrequest $request)
    {
        $data = new user();
        $data->name = $request->name;
        $data->usernama = $request->usernama;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->action('usercontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = user::find($id);
        return view ('admin.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = user::find($id);
        return view('admin.user.edit',compact('data'));
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
        $data = user::find($id);
        $data->name = $request->name;
        $data->usernama = $request->usernama;
        $data->email = $request->email;
        $data->role = $request->role;
        if (!empty($request->password)) {
            $data->password = bcrypt($request->password_confirmation);
        }
        $data->save();

        return redirect()->action('usercontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = user::destroy($id);
        return redirect()->action('usercontrol@index');
    }
}
