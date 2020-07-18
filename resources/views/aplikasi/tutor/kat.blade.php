@extends('layouts.aplikasi')

@section('judul')Kategori Tutorial | Ngodinger @endsection
@section('desc','Ngodinger adalah media yang membahas tentang tutorial dan informasi seputar dunia pemrograman. Mulai dari Artikel, Tutorial, Skill, Native dan Framework.')
@section('keys','Artikel, Tutorial, Skill, Native, Framework')
@section('auth','Diinggo Sirojudin')
@section('foto'){{url('image/index.png')}}@endsection

@section('konten') @include('layouts.iklan')
<div class="container">
	<div class="row">
		<div class="col-md-8">
		<div class="page-header bd-1px">
			<h1>Semua Kategori Tutorial</h1>
		</div>
		<!--  -->
			<div class="show-iklan">
				@yield('r728')
			</div>
		<!--  -->
			@foreach($data as $data)
			<div class="panel panel-primary app-panel">
				<div class="panel-heading">
					<h5 class="populer nover"><a href="{{url('tutor/category',$data->slugkat)}}" 
					data-toggle="tooltip" data-placement="bottom" title="{{$data->nama}}">{{$data->nama}}&nbsp;
					<i class="fa fa-arrow-circle-right"></i></a></h5></div>
				<div class="panel-body">{{$data->diskripsi}}</div>
			</div>
			@endforeach
		<!--  -->
			<div class="show-iklan">
				@yield('r728b')
			</div>
		</div>

		<div class="col-md-4 pd-50">
			<div class="row sideblog">
				<div class="col-md-11 col-sm-6 col-md-offset-1">
					<div class="show-iklan">
						@yield('c300')
					</div>
				</div>
			<!--  -->
				<div class="col-md-11 col-sm-6 col-md-offset-1">
					<div class="panel-primary app-panel mg-30px">
						<div class="panel-heading"><h4 class="populer">Official Ngodinger</h4></div>
						<div class="panel-body">
							@include('layouts.sosialmedia')
					</div>
					<div class="show-iklan">
						@yield('r300')
					</div>
				</div>
			<!--  -->
			</div>
		</div>
	</div>
</div>
@endsection