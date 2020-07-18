<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\tutorkategori;
use DB;

class tutorkategoricontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tutorkategori')->orderBy('nama','ASC')->get();
        return view('admin.tutorkategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data = tutorkategori::all();
        return view('admin.tutorkategori.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new tutorkategori;
        $data->nama = $request->nama;
        $data->slugkat = str_slug($request->nama);
        $data->diskripsi = $request->diskrip;
        $data->save();
        return redirect()->action('tutorkategoricontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = tutorkategori::find($id);
        return view ('admin.tutorkategori.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tutorkategori::find($id);
        return view ('admin.tutorkategori.edit',compact('data'));
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
        $data = tutorkategori::find($id);
        $data->nama = $request->nama;
        $data->slugkat = str_slug($request->nama);
        $data->diskripsi = $request->deskripsi;
        $data->save();
        return redirect()->action('tutorkategoricontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tutorkategori::destroy($id);
        return redirect()->action('tutorkategoricontrol@index');
    }
}
