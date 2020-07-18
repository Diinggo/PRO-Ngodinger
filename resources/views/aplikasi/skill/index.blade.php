@extends('layouts.aplikasi')


@section('utm','?utm_source=ngodinger&utm_medium=new_article&utm_campaign=skill_loop')

@section('judul','Skill - Ngodinger : Tutorial dan Informasi Seputar Dunia Pemrograman')

@section('desc','Skill membahas tentang Tutorial yang berisi video yang bisa diihat secara gratis.')

@section('keys','Video, Tutorial. Youtube, Mediaelement, Skill')

@section('auth','Diinggo Sirojudin')

@section('foto'){{url('image/index.png')}}@endsection

@section('tag')
<meta property="article:section" content="Skill">
@endsection

@section('konten') @include('layouts.iklan')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header bd-1px">Welcome To Skill Ngodinger</h1>
		</div>
	</div>
<!-- Iklan -->
	<div class="row show-iklan">
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
<!--  -->
	<div class="row">
		@foreach($data as $data)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('skill',$data->slug)}}@yield('utm')" data-toggle="tooltip" data-placement="bottom" title="{{$data->judul}}" class="head-link">
					<div class="box-img">
						<img src="{{$data->foto}}" alt="{{$data->judul}}" />
					</div></a>
					<div class="box-cat">
						<a href="{{url('skill/category',$data->slugkat)}}" data-toggle="tooltip" data-placement="bottom" title="{{$data->diskripsi}}">{{$data->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">{{ date('M d, Y.',strtotime($data->created_at))}}</div>
					<div class="box-title">
						<a href="{{url('skill',$data->slug)}}@yield('utm')" data-toggle="tooltip" data-placement="top" title="{{$data->deskripsi}}" class="title-link">
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
<!-- Iklan -->
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