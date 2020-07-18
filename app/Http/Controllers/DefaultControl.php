<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\blogpost;
use App\blogkategori;
use App\bloglog;
use App\tutorlog;
use App\skilllog;
use DB;
class DefaultControl extends Controller
{
    public function index()
    {
        $art = DB::table('blogpost')
        ->join('users','users.id','=','blogpost.userid')
        ->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
        ->where('status','=','publish')
        ->orderBy('blogpost.id','DESC')
        ->select('blogpost.*','blogkategori.nama','blogkategori.slugkat','blogkategori.diskripsi','users.name','users.usernama')
        ->limit(16)->get();

        $tut = DB::table('tutorpost')
        ->join('users','users.id','=','tutorpost.userid')
        ->join('tutorkategori','tutorkategori.id','=','tutorpost.tutorid')
        ->where('status','=','publish')
        ->orderBy('tutorpost.id','DESC')
        ->select('tutorpost.*','tutorkategori.nama','tutorkategori.slugkat','tutorkategori.diskripsi','users.name','users.usernama')
        ->limit(16)->get();

        $ski = DB::table('skillpost')
        ->join('users','users.id','=','skillpost.userid')
        ->join('skillkategori','skillkategori.id','=','skillpost.skillid')
        ->where('status','=','publish')
        ->orderBy('skillpost.id','DESC')
        ->select('skillpost.*','skillkategori.nama','skillkategori.slugkat','skillkategori.diskripsi','users.name','users.usernama')
        ->limit(16)->get();

    	return view('aplikasi.home',compact('art','tut','ski'));
    }

    /*
    * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    * Blog Handling
    * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
    */
    public function blogindex()
    {
        $data = DB::table('blogpost')
        ->join('users','users.id','=','blogpost.userid')
        ->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
        ->where('status','=','publish')
        ->orderBy('blogpost.id','DESC')
        ->select('blogpost.*','blogkategori.nama','blogkategori.slugkat','blogkategori.diskripsi','users.name','users.usernama')
        ->paginate(20);

        $most = DB::table('blogpost')
        ->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
        ->join('bloglog','bloglog.blogid','=','blogpost.id')
        ->select('blogpost.*','blogkategori.nama','blogkategori.slugkat', DB::raw('COUNT(*) as jumlah, bloglog.blogid'))
        ->orderBy('jumlah','DESC')
        ->groupBy('blogpost.id')->first();

        $more = DB::table('blogpost')
        ->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
        ->join('bloglog','bloglog.blogid','=','blogpost.id')
        ->select('blogpost.*','blogkategori.nama','blogkategori.slugkat', DB::raw('COUNT(*) as jumlah, bloglog.blogid'))
        ->orderBy('jumlah','DESC')
        ->groupBy('blogpost.id')->skip(1)->take(4)->get();

    	return view('aplikasi.blog.index',compact('data','most','more') ,[ 'data1' => $data ]);
    }
    public function blogslug(Request $request, $slug)
    {
        $data = DB::table('blogpost')->where('slug','=',$slug)->first();
        $ip = $request->getClientIp();
            
        // if ($data == null) {
            // return redirect()->action('DefaultControl@blogindex');
        // } elseif ($data->status !== 'publish') {
            // return View ('error.500');
        // } else {
            $user = DB::table('users')->where('id','=',$data->userid)->first();
            $kate = DB::table('blogkategori')->where('id','=',$data->kategoriid)->first();
            // $log = DB::table('bloglog')->where('blogid','=',$data->id,'AND','ip','=',$ip)->first();
            // if ($log == null) {
                $sim = new bloglog;
                $sim->blogid = $data->id;
                $sim->ip = $ip;
                $sim->save();
            // }
            return View('aplikasi.blog.show',compact('data','user','kate'));
        // }
    }
    public function blogkat()
    {
        $data = DB::table('blogkategori')->orderBy('nama','ASC')->get();
        return view('aplikasi.blog.kat',compact('data'));
    }
    public function blogkategori($slug)
    {
        $kate = DB::table('blogkategori')->where('slugkat','=',$slug)->first();

        $kage = DB::table('blogkategori')->orderBy('nama','ASC')->get();

        $more = DB::table('blogkategori')
        ->join('blogpost','blogpost.kategoriid','=','blogkategori.id')
        ->select('blogkategori.*', DB::raw('COUNT(*) as jumlah, blogpost.kategoriid'))
        ->orderBy('blogkategori.nama','ASC')
        ->groupBy('blogkategori.id')->get();

        $cek1 = DB::table('blogpost')->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
            ->where('blogkategori.slugkat','=',$slug)->first();

        // if ($kate !== null) {
            $data = DB::table('blogpost')->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
            ->join('users','users.id','=','blogpost.userid')
            ->select('blogpost.*','blogkategori.nama','blogkategori.slugkat','blogkategori.diskripsi','users.name','users.usernama')
            ->where('blogkategori.slugkat','=',$slug)->orderBy('blogpost.id','DESC')->paginate('12');

            return view('aplikasi.blog.kategori',compact('data','cek1','kate','more','slug'),[ 'pagi' => $data ]);
        // } else {
        //     return view('aplikasi.blog.kategori',compact('cek1','kate','slug'),[ 'pagi' => $data ]);
        // }
    }
    public function blogtag($slug)
    {
        $slud = "%".str_replace('-',' ',$slug)."%";
        $data = DB::table('blogpost')->where('keyword','LIKE',$slud)
        ->orderBy('id','DESC')->paginate(5);
        return view('aplikasi.blog.tag',compact('data','slug'),['pagi' => $data]);
    }
    /* ============================
    *  Tutorial Handling
       ===========================*/
    public function tutor()
    {
        $data = DB::table('tutorpost')
        ->join('tutorkategori','tutorkategori.id','=','tutorpost.tutorid')
        ->join('users','users.id','=','tutorpost.userid')
        ->where('status','=','publish')
        ->orderBy('tutorpost.id','DESC')
        ->select('tutorpost.*','tutorkategori.nama','tutorkategori.slugkat','tutorkategori.diskripsi','users.name','users.usernama')
        ->paginate(20);

        return view('aplikasi.tutor.index',compact('data') ,[ 'pagi' => $data ]);
    }
    public function tutorslug(Request $request, $slug)
    {
        $data = DB::table('tutorpost')->where('slug','=',$slug)->first();
        $ip = $request->getClientIp();
            
        if ($data == null) {
            return redirect()->action('DefaultControl@tutor');
        // } elseif ($data->status !== 'publish') {
            // return View ('error.500');
        } else {
            $user = DB::table('users')->where('id','=',$data->userid)->first();
            $kate = DB::table('tutorkategori')->where('id','=',$data->tutorid)->first();
            // $log = DB::table('bloglog')->where('blogid','=',$data->id,'AND','ip','=',$ip)->first();
            // if ($log == null) {
                $sim = new tutorlog;
                $sim->postid = $data->id;
                $sim->ip = $ip;
                $sim->save();
            // }
            return View('aplikasi.tutor.show',compact('data','user','kate'));
        }
    }
    public function tutorkat()
    {
        $data = DB::table('tutorkategori')->orderBy('nama','ASC')->get();
        return view('aplikasi.tutor.kat',compact('data'));
    }
    public function tutorkategori($slug)
    {
        $kate = DB::table('tutorkategori')->where('slugkat','=',$slug)->first();

        $kage = DB::table('tutorkategori')->orderBy('nama','ASC')->get();

        $more = DB::table('tutorkategori')
        ->join('tutorpost','tutorpost.tutorid','=','tutorkategori.id')
        ->select('tutorkategori.*', DB::raw('COUNT(*) as jumlah, tutorpost.tutorid'))
        ->orderBy('tutorkategori.nama','ASC')
        ->groupBy('tutorkategori.id')->get();

        $cek1 = DB::table('tutorpost')->join('tutorkategori','tutorkategori.id','=','tutorpost.tutorid')
            ->where('tutorkategori.slugkat','=',$slug)->first();

        // if ($kate !== null) {
            $data = DB::table('tutorpost')->join('tutorkategori','tutorkategori.id','=','tutorpost.tutorid')
            ->join('users','users.id','=','tutorpost.userid')
            ->select('tutorpost.*','tutorkategori.nama','tutorkategori.slugkat','tutorkategori.diskripsi','users.name','users.usernama')
            ->where('tutorkategori.slugkat','=',$slug)->orderBy('tutorpost.id','DESC')->paginate('15');

            return view('aplikasi.tutor.kategori',compact('data','cek1','kate','more','slug'),[ 'pagi' => $data ]);
        // } else {
        //     return view('aplikasi.blog.kategori',compact('cek1','kate','slug'),[ 'pagi' => $data ]);
        // }
    }
    public function tutortag($slug)
    {
        $slud = "%".str_replace('-',' ',$slug)."%";
        $data = DB::table('tutorpost')
            ->where('keyword','LIKE',$slud)
            ->orderBy('id','DESC')->paginate(5);
        return view('aplikasi.tutor.tag',compact('data','slug'),['pagi' => $data]);
    }

    /* ===============================
    *  Skill Handling
       ===============================*/
    public function skill()
    {
        $data = DB::table('skillpost')
        ->join('skillkategori','skillkategori.id','=','skillpost.skillid')
        ->join('users','users.id','=','skillpost.userid')
        ->where('status','=','publish')
        ->orderBy('skillpost.id','DESC')
        ->select('skillpost.*','skillkategori.nama','skillkategori.slugkat','skillkategori.diskripsi','users.name','users.usernama')
        ->paginate(20);

        return view('aplikasi.skill.index',compact('data') ,[ 'pagi' => $data ]);
    }
    public function skillslug(Request $request, $slug)
    {
        $data = DB::table('skillpost')->where('slug','=',$slug)->first();
        $ip = $request->getClientIp();
            
        // if ($data == null) {
            // return redirect()->action('DefaultControl@blogindex');
        // } elseif ($data->status !== 'publish') {
            // return View ('error.500');
        // } else {
            $user = DB::table('users')->where('id','=',$data->userid)->first();
            $kate = DB::table('skillkategori')->where('id','=',$data->skillid)->first();
            // $log = DB::table('bloglog')->where('blogid','=',$data->id,'AND','ip','=',$ip)->first();
            // if ($log == null) {
                $sim = new skilllog;
                $sim->postid = $data->id;
                $sim->ip = $ip;
                $sim->save();
            // }
            return View('aplikasi.skill.show',compact('data','user','kate'));
        // }
    }
    public function skillkat($value='')
    {
        $data = DB::table('skillkategori')->orderBy('nama','ASC')->get();
        return view('aplikasi.skill.kat',compact('data'));
    }
    public function skillkategori($slug)
    {
        $kate = DB::table('skillkategori')->where('slugkat','=',$slug)->first();

        $kage = DB::table('skillkategori')->orderBy('nama','ASC')->get();

        $more = DB::table('skillkategori')
        ->join('skillpost','skillpost.skillid','=','skillkategori.id')
        ->select('skillkategori.*', DB::raw('COUNT(*) as jumlah, skillpost.skillid'))
        ->orderBy('skillkategori.nama','ASC')
        ->groupBy('skillkategori.id')->get();

        $cek1 = DB::table('skillpost')->join('skillkategori','skillkategori.id','=','skillpost.skillid')
            ->where('skillkategori.slugkat','=',$slug)->first();

        // if ($kate !== null) {
            $data = DB::table('skillpost')->join('skillkategori','skillkategori.id','=','skillpost.skillid')
            ->join('users','users.id','=','skillpost.userid')
            ->select('skillpost.*','skillkategori.nama','skillkategori.slugkat','skillkategori.diskripsi','users.name','users.usernama')
            ->where('skillkategori.slugkat','=',$slug)->orderBy('skillpost.id','DESC')->paginate('15');

            return view('aplikasi.skill.kategori',compact('data','cek1','kate','more','slug'),[ 'pagi' => $data ]);
        // } else {
        //     return view('aplikasi.blog.kategori',compact('cek1','kate','slug'),[ 'pagi' => $data ]);
        // }
    }
    public function skilltag($slug)
    {
        $slud = "%".str_replace('-',' ',$slug)."%";
        $data = DB::table('skillpost')
            ->where('keyword','LIKE',$slud)
            ->orderBy('id','DESC')->paginate(5);
        return view('aplikasi.skill.tag',compact('data','slug'),['pagi' => $data]);
    }
    /* ===============================
    *  Aplikasi Handling
       ===============================*/
    public function native()
    {
        $data = DB::table('appmenu')
            ->join('applink','applink.menuid','=','appmenu.id')
            ->where('appmenu.menu','=','native')
            ->where('applink.status','=','publish')
            ->orderBy('applink.namalink','ASC')
            ->get();
        return view('aplikasi.app.native-index',compact('data'));
    }
    public function nativenama($nama)
    {
        $slug = '';
        $data = DB::table('appkonten')
            ->join('appkategori','appkategori.id','=','appkonten.kategoriid')
            ->join('applink','applink.id','=','appkategori.linkid')
            ->join('appmenu','appmenu.id','=','applink.menuid')
            ->where('appmenu.menu','=','native')
            ->where('applink.sluglink','=',$nama)
            ->where('appkonten.slugside','=','index')
            ->select('appkonten.*','appkategori.kategori')->first();
        if ($data == Null) {
            return redirect('native');
        }
            return view ('aplikasi.app.native-show',compact('data','nama','slug'));
    }
    public function nativeslug($nama, $slug)
    {
        $data = DB::table('appkonten')
            ->join('appkategori','appkategori.id','=','appkonten.kategoriid')
            ->join('applink','applink.id','=','appkategori.linkid')
            ->join('appmenu','appmenu.id','=','applink.menuid')
            ->where('appmenu.menu','=','native')
            ->where('applink.sluglink','=',$nama)
            ->where('appkonten.slugside','=',$slug)
            ->select('appkonten.*','appkategori.kategori')->first();
        if ($data == Null) {
            return redirect('native/'.$nama);
        }
            return view ('aplikasi.app.native-show',compact('data','nama','slug'));
    }
    public function frame()
    {
        $data = DB::table('appmenu')
            ->join('applink','applink.menuid','=','appmenu.id')
            ->where('appmenu.menu','=','framework')
            ->where('applink.status','=','publish')
            ->orderBy('applink.namalink','ASC')
            ->get();
        return view('aplikasi.app.frame-index',compact('data'));
    }
    public function framenama($nama)
    {
        $slug = '';
        $data = DB::table('appkonten')
            ->join('appkategori','appkategori.id','=','appkonten.kategoriid')
            ->join('applink','applink.id','=','appkategori.linkid')
            ->join('appmenu','appmenu.id','=','applink.menuid')
            ->where('appmenu.menu','=','framework')
            ->where('applink.sluglink','=',$nama)
            ->where('appkonten.slugside','=','index')
            ->select('appkonten.*','appkategori.kategori')->first();
        if ($data == Null) {
            return redirect('framework');
        }
            return view ('aplikasi.app.frame-show',compact('data','nama','slug'));
    }
    public function frameslug($nama, $slug)
    {
        $data = DB::table('appkonten')
            ->join('appkategori','appkategori.id','=','appkonten.kategoriid')
            ->join('applink','applink.id','=','appkategori.linkid')
            ->join('appmenu','appmenu.id','=','applink.menuid')
            ->where('appmenu.menu','=','framework')
            ->where('applink.sluglink','=',$nama)
            ->where('appkonten.slugside','=',$slug)
            ->select('appkonten.*','appkategori.kategori')->first();

        if ($data == Null) {
            return redirect('framework/'.$nama);
        }
            return view ('aplikasi.app.frame-show',compact('data','nama','slug'));
    }
    // ====================================================================================== About
    public function about($slug)
    {
        $data = DB::table('setting')->where('slug','=',$slug)->where('status','=','baku')->first();
        return view('aplikasi.setting.index',compact('data'));
    }
    public function dev($slug)
    {
        $data = DB::table('setting')->where('slug','=',$slug)->where('status','=','tambah')->first();
        return view('aplikasi.setting.index',compact('data'));
    }
    public function author($slug)
    {
        $data = DB::table('users')->where('name','=',$slug)->first();
        return view('aplikasi.setting.author',compact('data'));
    }
}