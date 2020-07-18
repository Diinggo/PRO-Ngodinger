@extends('layouts.aplikasi')

@section('utm','?utm_source=ngodinger&utm_medium=new_article&utm_campaign=tutorial_loop')

@section('judul','Tutorial - Ngodinger: Tutorial dan Informasi Seputar Dunia Pemrograman')
@section('desc','Tutorial membahas tentang petunjuk atau prosedur untuk membuat suatu aplikasi.')
@section('keys','Tutorial, Manual, Native, Framework, Otomatis')
@section('auth','Diinggo Sirojudin')
@section('foto'){{url('image/index.png')}}@endsection

@section('tag')
<meta property="article:section" content="Tutorial">
@endsection

@section('konten') @include('layouts.iklan')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header bd-1px">Welcome To Tutorial Ngodinger</h1>
			</div>
		</div>
	<!-- Iklan -->
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="show-iklan">
					@yield('r300')
				</div>
			</div>
			<div class="col-sm-6 col-md-4 col-md-push-4">
				<div class="show-iklan">
					@yield('r300b')
				</div>
			</div>
			<div class="col-sm-12 col-md-4 col-md-pull-4">
				<div class="show-iklan">
					@yield('c300')
				</div>
			</div>
		</div>		
	<!-- Iklan -->
		<div class="row">
		@foreach($data as $data)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('tutor',$data->slug)}}@yield('utm')"
						data-toggle="tooltip" data-placement="bottom" title="{{$data->judul}}" class="head-link">
							<div class="box-img">
								<img src="{{$data->foto}}" alt="{{$data->judul}}" />
							</div>
					</a>
					<div class="box-cat">
						<a href="{{url('tutor/category',$data->slugkat)}}"
							data-toggle="tooltip" data-placement="bottom" title="{{$data->diskripsi}}">
								{{$data->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">{{ date('M d, Y.',strtotime($data->created_at))}}</div>
					<div class="box-title">
						<a href="{{url('tutor',$data->slug)}}@yield('utm')"
							data-toggle="tooltip" data-placement="top" title="{{$data->deskripsi}}" class="title-link">
								<h4>{{$data->judul}}</h4>
						</a>
					</div>
					<div class="box-auth">
						<a href="{{url('author',$data->name)}}" title="{{$data->usernama}}">{{$data->usernama}}</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		</div>
		<!--  -->
		<div class="row">
			<div class="col-md-12 show-iklan">
				@yield('r728')
			</div>
		</div>
		<!--  -->
		<div class="row">
			<div class="col-md-12">
			<center>{!! $pagi->render() !!}</center>
			</div>
		</div>
	</div>
@endsection