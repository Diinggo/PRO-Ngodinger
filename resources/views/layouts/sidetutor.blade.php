<?php
$z=1;$x=1;$v=1;
$more = DB::table('tutorpost')
    ->join('tutorlog','tutorlog.postid','=','tutorpost.id')
    ->select('tutorpost.*', DB::raw('COUNT(*) as jumlah, tutorlog.postid'))
    ->orderBy('jumlah','DESC')
    ->groupBy('tutorpost.id')->limit(5)->get();

$terb = DB::table('tutorpost')->orderBy('id','DESC')->limit(5)->get();

$kago = DB::table('tutorpost')->join('tutorkategori','tutorkategori.id','=','tutorpost.tutorid')
	->where('tutorkategori.id','=',$data->tutorid)->orderBy('tutorpost.id','DESC')
	->limit(5)->get();
?>
<div class="row sideblog">
	<div class="col-sm-6 col-md-11">
		<div class="show-iklan">
			@yield('c600')
		</div>
		<div class="text-center">
			@yield('r300')
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 pd-30">
		<div class="pane panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Tutorial Terkait</h4></div>
			<div class="panel-body">
				@foreach($kago as $kago)
				<div class="media">
					<div class="media-left">
						<div class="media-nomor">{{$v++}}</div>
					</div>
					<div class="media-body media-garis text-right">
						<h4 class="media-judul"><a href="{{url('tutor',$kago->slug)}}" title="{{$kago->judul}}">{{$kago->judul}}</a></h4>
						<div class="media-waktu">{{$kago->nama}}</div>
					</div>
				</div>
				@endforeach
				<a href="{{url('tutor/category',$kago->slugkat)}}" title="{{$kago->nama}}" 
				class="btn btn-success btn-block btn-sm">Tutorial Lain Dari Kategori Ini . . .</a>
			</div>
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11">
		<div class="pane panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Tutorial Populer</h4></div>
			<div class="panel-body">
				@foreach($more as $more)
				<div class="media">
					<div class="media-left">
						<div class="media-nomor">{{$z++}}</div>
					</div>
					<div class="media-body media-garis text-right">
						<h4 class="media-judul"><a href="{{url('tutor',$more->slug)}}" title="{{$more->judul}}">{{$more->judul}}</a></h4>
						<div class="media-waktu">{{$more->jumlah}} views</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11">
		<div class="pane panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Tutorial Terbaru</h4></div>
			<div class="panel-body">
				@foreach($terb as $terb)
				<div class="media">
					<div class="media-left">
						<div class="media-nomor">{{$x++}}</div>
					</div>
					<div class="media-body media-garis text-right">
						<h4 class="media-judul"><a href="{{url('tutor',$terb->slug)}}" title="{{$terb->judul}}">{{$terb->judul}}</a></h4>
						<div class="media-waktu">Pukul {{date('h : i A, M d, Y',strtotime($terb->created_at))}}</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="col-md-11 col-sm-6">
		<div class="panel-primary app-panel mg-30px">
			<div class="panel-heading"><h4 class="populer">Official Ngodinger</h4></div>
			<div class="panel-body text-right">
			@include('layouts.sosialmedia')
		</div>
		<div class="show-iklan">
			@yield('c300')
		</div>
	<!--  -->
	</div>
</div>
<!--  -->