<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\userrequest;

use App\applink;
use App\appkategori;
use App\appkonten;
use App\appmenu;
use DB;
use App\user;

class aplikasicontrol extends Controller
{
    public function edit($id) {
        $data = user::find($id);
        return view('admin.user.editsetting',compact('data')); }
    public function pedit(Request $request, $id) {
        $data = user::find($id);
        $data->name = $request->name;
        $data->usernama = $request->usernama;
        $data->email = $request->email;
        $data->bio = $request->bio;
        $data->fb = $request->fb;
        $data->tw = $request->tw;
        $data->ig = $request->ig;
        $data->link = $request->wb;
        $data->foto = $request->foto;
        $data->save();
        return redirect('admin/edit/'.$id); }
    public function pass($id) {

        return view('admin.user.passsetting'); }

    public function ppass(Request $request, $id) {

        $data = user::find($id);
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect('admin');
    }

    public function index()
    {
        $data = DB::table('applink')->join('appmenu','applink.menuid','=','appmenu.id')
            ->select('applink.*','appmenu.menu','appmenu.submenu')
            ->orderBy('applink.id','DESC')->get();

    	return view('admin.app.index',compact('data'));
    }

    /*New Aplikasi*/
    public function getnewapp()
    {
    	return view('admin.app.newapp');
    }
    public function postnewapp(Request $request)
    {
    	$datalink = new applink;
    	$datalink->menuid = $request->menuid;
    	$datalink->namalink = $request->namalink;
    	$datalink->sluglink = str_slug($datalink->namalink);
    	$datalink->status = 'draft';
    	$datalink->save();

    	return redirect()->action('aplikasicontrol@index');
    }

    /*Edit Aplikasi*/
    public function geteditapp($id)
    {
    	$data = applink::find($id);
        $dat1 = appmenu::all();
    	return view ('admin.app.editapp',compact('data','dat1','id'));
    }
    public function posteditapp(Request $request, $id)
    {
    	$data = applink::find($id);

    	if($request->has('saved')){
            $data->status = 'draft';
        } elseif ($request->has('published')) {
            $data->status = 'publish';
        } else {
            $data->menuid = $request->menuid;
        	$data->namalink = $request->namalink;
    		$data->sluglink = str_slug($data->namalink);
        }

    	$data->save();

    	return redirect()->action('aplikasicontrol@index');
    }
    // Hapus Aplikasi
    public function postdelapp($id)
    {
    	$datalink = applink::destroy($id);
    	return redirect()->action('aplikasicontrol@index');
    }

    /*
    * Kategori Aplikasi
    */
    public function konten($id)
    {
    	$datalink = applink::where('id',$id)->first();
    	return view('admin.app.default',compact('datalink','id'));
    }
    public function getnewkat($id)
    {
    	$datapi = applink::where('id',$id)->first();
    	return view('admin.app.newkat',compact('datapi'));
    }
    public function postnewkat(Request $request, $id)
    {
    	$kate = new appkategori;
    	$kate->kategori = $request->kategori;
    	$kate->deskripsi = $request->deskripsi;
    	$kate->linkid = $request->linkid;
    	$kate->save();
    	return redirect('admin/app/'.$id);
    }
    public function postdelkat($nm, $id)
    {
    	$hapus = appkategori::destroy($id);
    	return redirect('admin/app/'.$nm);
    }
    public function geteditkat(Request $request, $id, $nm )
    {
    	$datapi = appkategori::where('id',$nm)->first();
    	return view('admin.app.editkat',compact('datapi','id','nm'));
    }
    public function posteditkat(Request $request, $id, $nm )
    {
    	$datakat = appkategori::find($nm);
    	$datakat->kategori = $request->kategori;
    	$datakat->deskripsi = $request->deskripsi;
    	$datakat->save();
    	return redirect('admin/app/'.$id);
    }

    /*
    * Konten Aplikasi
    */
    public function getnewkon($id)
    {
    	$datalink = applink::where('id',$id)->first();
    	return view('admin.app.newkon',compact('datalink','id'));
    }
    public function postnewkon(Request $request, $id)
    {
    	$datakon = new appkonten;
    	$datakon->kategoriid = $request->kategoriid;
    	$datakon->sidejudul = $request->sidejudul;

        $cek1 = $request->slugside;
        if ($cek1 == null) {
            $datakon->slugside = str_slug($datakon->sidejudul,'_');
        } else {
            $datakon->slugside = $request->slugside;
        }
    	$datakon->judul = $request->judul;
    	$datakon->konten = $request->konten;
    	$datakon->foto = $request->foto;
    	$datakon->save();

    	return redirect('admin/app/'.$id);
    }
    public function postdelkon($sn, $id)
    {
    	$hipus = appkonten::destroy($id);
    	return redirect('admin/app/'.$sn);
    }
    public function geteditkon($id, $nm)
    {
    	$datakonten = appkonten::where('id',$nm)->first();
    	$datalink = applink::where('id',$id)->first();
    	return view('admin.app.editkon',compact('datakonten','id','datalink'));
    }
    public function posteditkon(Request $request, $id, $nm)
    {
    	$dataplus = appkonten::find($nm);
    	$dataplus->kategoriid = $request->kategoriid;
    	$dataplus->sidejudul = $request->sidejudul;

        $cek = $request->slugside;
        if ($cek == null) {
            $dataplus->slugside = str_slug($dataplus->sidejudul,'_');
        } else {
            $dataplus->slugside = $request->slugside;
        }
    	$dataplus->judul = $request->judul;
    	$dataplus->konten = $request->konten;
    	$dataplus->foto = $request->foto;
    	$dataplus->save();

    	return redirect('admin/app/'.$id);
    }
}
