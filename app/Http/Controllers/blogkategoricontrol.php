<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\blogkategori;
use DB;

class blogkategoricontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('blogkategori')->orderBy('nama','ASC')->get();
        return view('admin.blogkategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = blogkategori::all();
        return view('admin.blogkategori.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new blogkategori;
        $data->nama = $request->nama;
        $data->slugkat = str_slug($request->nama);
        $data->diskripsi = $request->diskrip;
        $data->save();
        return redirect()->action('blogkategoricontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = blogkategori::find($id);
        return view ('admin.blogkategori.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = blogkategori::find($id);
        return view ('admin.blogkategori.edit',compact('data'));
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
        $data = blogkategori::find($id);
        $data->nama = $request->nama;
        $data->slugkat = str_slug($request->nama);
        $data->diskripsi = $request->deskripsi;
        $data->save();
        return redirect()->action('blogkategoricontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = blogkategori::destroy($id);
        return redirect()->action('blogkategoricontrol@index');
    }
}
