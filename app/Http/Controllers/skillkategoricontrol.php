<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\skillpost;
use App\skillkategori;

class skillkategoricontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('skillkategori')->orderBy('nama','ASC')->get();
        return view('admin.skillkategori.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = skillkategori::all();
        return view('admin.skillkategori.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new skillkategori;
        $data->nama = $request->nama;
        $data->slugkat = str_slug($request->nama);
        $data->diskripsi = $request->diskrip;
        $data->save();
        return redirect()->action('skillkategoricontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = skillkategori::find($id);
        return view ('admin.skillkategori.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = skillkategori::find($id);
        return view ('admin.skillkategori.edit',compact('data'));
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
        $data = skillkategori::find($id);
        $data->nama = $request->nama;
        $data->slugkat = str_slug($request->nama);
        $data->diskripsi = $request->deskripsi;
        $data->save();
        return redirect()->action('skillkategoricontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = skillkategori::destroy($id);
        return redirect()->action('skillkategoricontrol@index');
    }
}
