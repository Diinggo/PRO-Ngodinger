@extends('layouts.aplikasi')

@section('judul','Framework Developer - Ngodinger | Tutorial dan Informasi Seputar Dunia Pemrograman')
@section('desc','Framework adalah pemrograman berupa')
@section('keys','Framework, Automatic, Library')
@section('foto','')
@section('auth','Diinggo Sirojudin')

@section('konten') @include('layouts.iklan')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header bd-1px">
					<h1 class="ha1">Semua Pemrograman Framework</h1>
				</div>
			</div>
			<!-- Iklan -->
			<div class="row show-iklan">
				<div class="col-sm-6 col-md-4">
					@yield('r300')
				</div>
				<div class="col-sm-6 col-md-4 col-md-push-4">
					@yield('r300b')
				</div>
				<div class="col-sm-12 col-md-4 col-md-pull-4">
					@yield('c300')
				</div>
			</div>
			<!-- Iklan -->
			<div class="row">
			@foreach($data as $data)
			<div class="col-md-3 col-sm-4">
				<div class="panel panel-primary mbtm">
					<div class="panel-heading text-center">
						<h4 class="ha3-margin">
						<a href="{{url('framework',$data->sluglink)}}" 
							data-toggle="tooltip" data-placement="top" title="{{$data->namalink}}">
								{{$data->namalink}}</a>
						</h4>
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
			<!-- Iklan -->
		</div>
	</div>
@endsection