@extends('layouts.aplikasi')

@section('utm','?utm_source=ngodinger&utm_medium=new_article&utm_campaign=home_loop')

@section('judul','Ngodinger - Tutorial dan Informasi Seputar Dunia Pemrograman')
@section('desc','Ngodinger adalah media yang membahas tentang tutorial dan informasi seputar dunia pemrograman. Mulai dari Artikel, Tutorial, Skill, Native dan Framework.')
@section('keys','Artikel, Tutorial, Skill, Native, Framework')
@section('auth','Diinggo Sirojudin')
@section('foto'){{url('image/index.png')}}@endsection

@section('style')
<style type="text/css">
	.nduwur { background: url('{{url('assets/images/back.jpg')}}') no-repeat fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover; }
	</style>
@endsection

@section('konten') @include('layouts.iklan')
<section id="Kepala" class="kepala nduwur">
	<div class="container-fluid jarak">
		<div class="row">
			<div class="col-md-12">
				<img src="assets/images/ngoding2.png" class="img-responsive" alt="Ngodinger">
				<div class="text-bar">
					<a href="#pilih" class="btn btn-kotak btn-border"><b>Pilih Sekarang</b></a><br>
					<h2 class="nexa-text"><b>Mulai Ngodinger</b></h2>
					<span class="skills">Web Designer - Front End - Back End - Full-Stack Developer</span>
					<div class="col-md-8 col-md-offset-2">
					<hr>
						<p class="nexa-text">Ngodinger adalah media yang membahas tentang tutorial dan informasi seputar dunia pemrograman. Mulai dari Artikel, Tutorial, Skill, Native dan Framework.</p>
					<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  -->
<div id="pilih"></div>
<section class="container">
	<div class="row pd-30">
		<div class="col-sm-6 col-md-4 show-iklan">
			@yield('r300')
		</div>
		<div class="col-sm-6 col-md-4 col-md-push-4 show-iklan">
			@yield('r300b')
		</div>
		<div class="col-sm-12 col-md-4 col-md-pull-4 show-iklan">
			@yield('c300')
		</div>
	</div>
	
	<div class="row" id="pilih">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Artikel Terbaru</h1>
			</div>
		</div>
	</div>
	<div class="row">
		@foreach($art as $art)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('blog',$art->slug)}}@yield('utm')" data-toggle="tooltip" 
						data-placement="bottom" title="{{$art->judul}}" class="head-link">
						<div class="box-img">
							<img src="{{$art->foto}}" alt="{{$art->judul}}" />
						</div>
					</a>
					<div class="box-cat">
						<a href="{{url('blog/category',$art->slugkat)}}" data-toggle="tooltip" 
							data-placement="bottom" title="{{$art->diskripsi}}">{{$art->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">
						{{ date('M d, Y.',strtotime($art->created_at))}}
					</div>
					<div class="box-title">
						<a href="{{url('blog',$art->slug)}}@yield('utm')" data-toggle="tooltip" 
							data-placement="top" title="{{$art->deskripsi}}" class="title-link">
							<h4>{{$art->judul}}</h4>
						</a>
					</div>
					<div class="box-auth">
						<a href="{{url('author',$art->name)}}" title="{{$art->usernama}}">{{$art->usernama}}</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
<!-- Iklan -->
	<div class="row show-iklan">
		<div class="col-md-12">
			@yield('r728')
		</div>
	</div>
<!-- Iklan -->
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<a href="{{url('blog')}}" title="Artikel" class="btn btn-primary btn-block">Artikel Lainnya . . .</a>
		</div>
	</div>
</section>

<section class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Tutorial Menarik</h1>
			</div>
		</div>
	</div>
	<div class="row">
		@foreach($tut as $tut)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('tutor',$tut->slug)}}@yield('utm')" data-toggle="tooltip" 
							data-placement="bottom" title="{{$tut->judul}}" class="head-link">
						<div class="box-img">
							<img src="{{$tut->foto}}" alt="{{$tut->judul}}" />
						</div>
					</a>
					<div class="box-cat">
						<a href="{{url('category',$tut->slugkat)}}" data-toggle="tooltip" 
							data-placement="bottom" title="{{$tut->diskripsi}}">{{$tut->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">
						{{ date('M d, Y.',strtotime($tut->created_at))}}
					</div>
					<div class="box-title">
						<a href="{{url('tutor',$tut->slug)}}@yield('utm')" data-toggle="tooltip" 
								data-placement="top" title="{{$tut->deskripsi}}" class="title-link">
							<h4>{{$tut->judul}}</h4>
						</a>
					</div>
					<div class="box-auth">
						<a href="{{url('author',$tut->name)}}" title="{{$tut->usernama}}">{{$tut->usernama}}</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
<!-- Iklan -->
	<div class="row show-iklan">
		<div class="col-md-12">
			@yield('r728b')
		</div>
	</div>
<!-- Iklan -->
	<div class="row">
		<div class="col-md-4 col-md-offset-8">
			<a href="{{url('tutor')}}" title="Tutorial" class="btn btn-primary btn-block">Tutorial Lainnya . . .</a>
		</div>
	</div>
</section>

<section class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Skill Terbaik</h1>
			</div>
		</div>
	</div>
	<div class="row">
		@foreach($ski as $ski)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('skill',$ski->slug)}}@yield('utm')" data-toggle="tooltip" 
						data-placement="bottom" title="{{$ski->judul}}" class="head-link">
					<div class="box-img">
						<img src="{{$ski->foto}}" alt="{{$ski->judul}}" />
					</div></a>
					<div class="box-cat">
						<a href="{{url('category',$ski->slugkat)}}" data-toggle="tooltip" 
							data-placement="bottom" title="{{$ski->diskripsi}}">{{$ski->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">
						{{ date('M d, Y.',strtotime($ski->created_at))}}
					</div>
					<div class="box-title">
						<a href="{{url('skill',$ski->slug)}}@yield('utm')" data-toggle="tooltip" 
							data-placement="top" title="{{$ski->deskripsi}}" class="title-link">
						<h4>{{$ski->judul}}</h4>
						</a>
					</div>
					<div class="box-auth">
						<a href="{{url('author',$ski->name)}}" title="{{$ski->usernama}}">{{$ski->usernama}}</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<!-- Iklan -->
	<div class="row">
		<div class="col-md-12 show-iklan">
			@yield('r728c')
		</div>
	</div>
	<!-- Iklan -->
	<div class="row">
		<div class="col-md-4 col-md-offset-8 form-group">
			<a href="{{url('skill')}}" title="Skill" class="btn btn-primary btn-block">Skill Lainnya . . .</a>
		</div>
	</div>
</section>
@endsection
