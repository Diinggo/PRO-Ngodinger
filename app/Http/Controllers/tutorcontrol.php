<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use DB;
use App\tutorpost;
use App\tutorkategori;

class tutorcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('tutorpost')
            ->join('users', 'users.id', '=','tutorpost.userid')
            ->join('tutorkategori', 'tutorpost.tutorid',' =','tutorkategori.id')
            ->join('tutorlog','tutorlog.postid','=','tutorpost.id')
            ->select('tutorpost.*', 'users.name', 'tutorkategori.nama',DB::raw('COUNT(*) as jumlah, tutorlog.postid'))
            ->orderBy('tutorpost.id','desc')
            ->groupBy('tutorpost.id')
            ->get();

        return View ('admin.tutor.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = tutorkategori::all();
        return View ('admin.tutor.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new tutorpost;
        $data->userid = $request->user()->id;
        $data->tutorid = $request->kategori;
        $data->foto = $request->foto;
        $data->judul = $request->judul;
        $data->slug = str_slug($data->judul);
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
        return redirect()->action('tutorcontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('tutorpost')->where('id','=',$id)->first();
        $user = DB::table('users')->where('id','=',$data->userid)->first();
        $kate = DB::table('tutorkategori')->where('id','=',$data->tutorid)->first();
        return View('aplikasi.tutor.show',compact('data','user','kate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = tutorpost::find($id);
        $dat1 = tutorkategori::all();
        return View('admin.tutor.edit', compact('data','dat1'));
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
        
        $data = tutorpost::find($id);
        
        if($request->has('saved')){
            $data->status = 'draft';
        } elseif ($request->has('published')) {
            $data->status = 'publish';
        } else {
            $data->judul = $request->judul;
            $data->slug = str_slug($data->judul);
            $data->tutorid = $request->kategoriid;
            $data->userid = $request->user()->id;
            $data->deskripsi = $request->deskripsi;
            $data->keyword = $request->keyword;
            $data->konten = $request->konten;
            $data->foto = $request->foto;

            if($request->has('save')){
                $data->status = 'draft';
            } else {
                $data->status = 'publish';
            }
        }
        $data->save();
        return redirect()->action('tutorcontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = tutorpost::destroy($id);
        return redirect()->action('tutorcontrol@index');
    }
}
