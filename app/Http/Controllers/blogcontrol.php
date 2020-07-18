<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\blogkategori;
use App\blogpost;
use DB;

class blogcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('blogpost')
            ->join('users', 'blogpost.userid', '=','users.id')
            ->join('blogkategori', 'blogpost.kategoriid',' =','blogkategori.id')
            ->join('bloglog','bloglog.blogid','=','blogpost.id')
            ->select('blogpost.*', 'users.name', 'blogkategori.nama',DB::raw('COUNT(*) as jumlah, bloglog.blogid'))
            ->orderBy('blogpost.id','desc')
            ->groupBy('blogpost.id')
            ->get();

        return View ('admin.blog.default',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = blogkategori::all();
        return View ('admin.blog.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new blogpost;
        $data->judul = $request->judul;
        $data->slug = str_slug($data->judul);
        $data->kategoriid = $request->kategori;
        $data->userid = $request->user()->id;
        $data->keyword = $request->keyword;
        $data->deskripsi = $request->deskripsi;
        $data->konten = $request->konten;
        $data->foto = $request->foto;
        
        if($request->has('save')){
            $data->status = 'draft';
            $message = 'Post saved successfully';           
        } else {
            $data->status = 'publish';
            $message = 'Post published successfully';
        }
        $data->save();
        return redirect()->action('blogcontrol@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = blogpost::find($id);
        $user = DB::table('users')->where('id','=',$data->userid)->first();
        $kate = DB::table('blogkategori')->where('id','=',$data->kategoriid)->first();
        return view ('aplikasi.blog.show',compact('data','user','kate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = blogpost::find($id);
        $dat1 = blogkategori::all();
        return View('admin.blog.edit', compact('data','dat1'));
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
        $data = blogpost::find($id);
        
        if($request->has('saved')){
            $data->status = 'draft';
        } elseif ($request->has('published')) {
            $data->status = 'publish';
        } else {
            $data->judul = $request->judul;
            $data->slug = str_slug($data->judul);
            $data->kategoriid = $request->kategoriid;
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
        return redirect()->action('blogcontrol@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = blogpost::destroy($id);
        return redirect()->action('blogcontrol@index');
    }
}
