@extends('layouts.aplikasi')
<?php $z = 1; ?>

@section('judul')@if(!empty($kate)){{$kate->nama}}@else{{$slug}}@endif - Kategori Skill | Ngodinger @endsection
@section('desc')@if(!empty($kate)){{$kate->diskripsi}}@endif @endsection
@section('keys','kategori, section, category, tags')
@section('auth','Diinggo Sirojudin')
@section('foto'){{url('image/index.png')}}@endsection
@section('publish')@if(!empty($kate->created_at)){{$kate->created_at}}@endif @endsection
@section('update')@if(!empty($kate->updated_at)){{$kate->updated_at}}@endif @endsection

@section('konten') @include('layouts.iklan')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header bd-1px">
						<h1>Kategori : - @if(!empty($kate)) {{$kate->nama}} @else {{$slug}} @endif | Skill</h1>
					</div>
				</div>
			<!--  -->
				<div class="col-md-12">
					<div class=" show-iklan">
						@yield('r728')
					</div>
				</div>
			<!--  -->
				@if($cek1 !== null)
				<div class="col-md-12">
				<div class="row">
				@foreach($data as $data)
				<div class="col-md-4 col-sm-4">
					<div class="box box-small">
						<div class="box-head">
							<a href="{{url('skill',$data->slug)}}@yield('utm')" 
								data-toggle="tooltip" data-placement="bottom" title="{{$data->judul}}" class="head-link">
									<div class="box-img">
										<img src="{{$data->foto}}" alt="{{$data->judul}}" />
									</div>
							</a>
							<div class="box-cat">
								<a href="{{url('skill/category',$data->slugkat)}}" 
									data-toggle="tooltip" data-placement="bottom" title="{{$data->diskripsi}}">
										{{$data->nama}}</a>
							</div>
						</div>
						<div class="box-body">
							<div class="box-date">{{ date('M d, Y.',strtotime($data->created_at))}}</div>
							<div class="box-title">
								<a href="{{url('skill',$data->slug)}}@yield('utm')" 
									data-toggle="tooltip" data-placement="top" title="{{$data->deskripsi}}" class="title-link">
										<h4>{{$data->judul}}</h4>
								</a>
							</div>
							<div class="box-auth">
								<a href="{{url('author',$data->name)}}" 
									title="{{$data->usernama}}">{{$data->usernama}}</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				</div>
				</div>
				@else
				<div class="col-md-12">
					<div class="alert alert-danger text-center">
						<h4 class="populer">Maaf, Halaman Tidak Ditemukan !!!</h4>
					</div>
				</div>
				@endif
			<!--  -->
				<div class="col-md-12">
					<div class="show-iklan">
						@yield('r728b')
					</div>
				</div>
			<!--  -->
				<div class="col-md-12 text-center">
					{!! $pagi->render() !!}
				</div>
			</div>
		</div>
		<div class="col-md-4 pd-50">
			<div class="row sideblog">
				<div class="col-sm-6 col-md-11 col-md-offset-1">
					<div class="form-group">
						<a href="{{url('skill/category')}}" 
							title="Kategori Pada skill" class="btn btn-primary btn-block">Pilih Kategori</a>
					</div>
				<!-- Iklan -->
					<div class="show-iklan">
						@yield('c300')
					</div>
				<!-- Iklan -->
					<div class="pane panel-primary app-panel">
						<div class="panel-heading"><h4 class="populer">Kategori Lainnya</h4></div>
						<div class="panel-body">
							@foreach($more as $more)
							<div class="media">
								<div class="media-left">
									<div class="media-nomor">{{$z++}}</div>
								</div>
								<div class="media-body media-garis">
									<h4 class="media-judul">
										<a href="{{url('skill/category',$more->slugkat)}}" 
											data-toggle="tooltip" data-placement="bottom"  title="{{$more->nama}}">
											{{$more->nama}}
										</a>
									</h4>
									<div class="media-waktu">{{$more->jumlah}} Artikel</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				<!--  -->
				</div>
			<!--  -->
				<div class="col-sm-6 col-md-11 col-md-offset-1">
				<!--  -->
					<div class="panel-primary app-panel mg-30px">
						<div class="panel-heading"><h4 class="populer">Official Ngodinger</h4></div>
						<div class="panel-body">
							@include('layouts.sosialmedia')
						<div class="form-group show-iklan">
							@yield('r300')
						</div>
					</div>
					<!--  -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection