<?php
$z=1;$x=1;$v=1;
$more = DB::table('blogpost')
    ->join('bloglog','bloglog.blogid','=','blogpost.id')
    ->select('blogpost.*', DB::raw('COUNT(*) as jumlah, bloglog.blogid'))
    ->orderBy('jumlah','DESC')
    ->groupBy('blogpost.id')->limit(5)->get();

$terb = DB::table('blogpost')->orderBy('id','DESC')->limit(5)->get();

$kago = DB::table('blogpost')->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
	->where('blogkategori.id','=',$data->kategoriid)->orderBy('blogpost.id','DESC')
	->limit(7)->get();
?>
<div class="row sideblog">
<!-- Iklan -->
	<div class="col-sm-6 col-md-11 col-md-offset-1">
		<div class="show-iklan">
			@yield('c600')
		</div>
		<div class="text-center">
			@yield('r300')
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 col-md-offset-1 pd-30">
		<div class="pane panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Artikel Populer</h4></div>
			<div class="panel-body">
				@foreach($more as $more)
				<div class="media">
					<div class="media-left">
						<div class="media-nomor">{{$z++}}</div>
					</div>
					<div class="media-body media-garis">
						<h4 class="media-judul"><a href="{{url('blog',$more->slug)}}" title="{{$more->judul}}">{{$more->judul}}</a></h4>
						<div class="media-waktu">{{$more->jumlah}} views</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 col-md-offset-1">
		<div class="pane panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Artikel Terbaru</h4></div>
			<div class="panel-body">
				@foreach($terb as $terb)
				<div class="media">
					<div class="media-left">
						<div class="media-nomor">{{$x++}}</div>
					</div>
					<div class="media-body media-garis">
						<h4 class="media-judul"><a href="{{url('blog',$terb->slug)}}" title="{{$terb->judul}}">{{$terb->judul}}</a></h4>
						<div class="media-waktu">Pukul {{date('h : i A, M d, Y',strtotime($terb->created_at))}}</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-11 col-md-offset-1">
		<div class="pane panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Artikel Kategori</h4></div>
			<div class="panel-body">
				@foreach($kago as $kago)
				
				<div class="media">
					<div class="media-left">
						<div class="media-nomor">{{$v++}}</div>
					</div>
					<div class="media-body media-garis">
						<h4 class="media-judul"><a href="{{url('blog',$kago->slug)}}" title="{{$kago->judul}}">{{$kago->judul}}</a></h4>
						<div class="media-waktu">{{$kago->nama}}</div>
					</div>
				</div>
				@endforeach
				<a href="{{url('blog/category',$kago->slugkat)}}" title="{{$kago->nama}}" 
				class="btn btn-success btn-block btn-sm">Artikel Lain Dari Kategori Ini . . .</a>
			</div>
		</div>
	</div>

	<div class="col-md-11 col-sm-6 col-md-offset-1">
		<div class="panel-primary app-panel mg-30">
			<div class="panel-heading"><h4 class="populer">Official Ngodinger</h4></div>
			<div class="panel-body">
				@include('layouts.sosialmedia')
			</div>
			<div class="show-iklan">
				@yield('c300')
			</div>
		</div>
	</div>
</div>
<!--  -->