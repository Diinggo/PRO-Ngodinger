<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\setting;

class settingcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('setting')->orderBy('id','ASC')->get();
        return view('admin.setting.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new setting;
        $data->judul = $request->judul;
        $data->slug = $request->slug;
        $data->konten = $request->konten;
        $data->status = "tambah";
        $data->save();

        return redirect()->action('settingcontrol@index');
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
        $data = setting::find($id);
        return view('admin.setting.edit',compact('data'));
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
        $data = setting::find($id);
        $data->judul = $request->judul;
        $data->konten = $request->konten;

        $fin = setting::find($id)->first();
        if ($fin == "tambah") {
            $data->slug = $request->slug;
        }

        $data->save();

        return redirect()->action('settingcontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = setting::destroy($id);
        return redirect()->action('settingcontrol@index');
    }
}
