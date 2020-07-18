<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('index');
        }
    }
    public function index()
    {
        return view('admin.admin');
    }
    public function gallery()
    {
        return view('admin.gallery.index');
    }
    public function viewer()
    {
        $data = DB::table('blogpost')->orderBy('id','DESC')->get();
        return view('admin.gallery.viewer',compact('data'));
    }
    public function viewerid($id)
    {
        $data = DB::table('blogpost')->where('id','=',$id)->first();
        return view('admin.gallery.show',compact('data'));
    }
}
