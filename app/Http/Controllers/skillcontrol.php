<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\skillpost;
use App\skillkategori;

class skillcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('skillpost')
            ->join('users', 'users.id', '=','skillpost.userid')
            ->join('skillkategori', 'skillpost.skillid',' =','skillkategori.id')
            ->join('skilllog','skilllog.postid','=','skillpost.id')
            ->select('skillpost.*', 'users.name', 'skillkategori.nama', DB::raw('COUNT(*) as jumlah, skilllog.postid'))
            ->orderBy('skillpost.id','desc')
            ->groupBy('skillpost.id')
            ->get();

        return View ('admin.skill.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = skillkategori::all();
        return View ('admin.skill.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new skillpost;
        $data->userid = $request->user()->id;
        $data->skillid = $request->kategori;
        $data->judul = $request->judul;
        $data->slug = str_slug($data->judul);
        $data->foto = $request->foto;
        $data->video = $request->video;
        $data->konten = $request->konten;
        $data->keyword = $request->keyword;
        $data->deskripsi = $request->deskripsi;
        
        if($request->has('save')){
            $data->status = 'draft';
            $message = 'Post saved successfully';           
        } else {
            $data->status = 'publish';
            $message = 'Post published successfully';
        }
        $data->save();
        return redirect()->action('skillcontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('skillpost')->where('id','=',$id)->first();
        $user = DB::table('users')->where('id','=',$data->userid)->first();
        $kate = DB::table('skillkategori')->where('id','=',$data->skillid)->first();
        return View('aplikasi.skill.show',compact('data','user','kate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = skillpost::find($id);
        $dat1 = skillkategori::all();
        return View('admin.skill.edit', compact('data','dat1'));
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
        $data = skillpost::find($id);
        
        if($request->has('saved')){
            $data->status = 'draft';
        } elseif ($request->has('published')) {
            $data->status = 'publish';
        } else {
            $data->judul = $request->judul;
            $data->slug = str_slug($data->judul);
            $data->skillid = $request->kategoriid;
            $data->userid = $request->user()->id;
            $data->deskripsi = $request->deskripsi;
            $data->keyword = $request->keyword;
            $data->konten = $request->konten;
            $data->foto = $request->foto;
            $data->video = $request->video;

            if($request->has('save')){
                $data->status = 'draft';
            } else {
                $data->status = 'publish';
            }
        }
        $data->save();
        return redirect()->action('skillcontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = skillpost::destroy($id);
        return redirect()->action('skillcontrol@index');
    }
}
