@extends('layouts.aplikasi')

@section('judul')#{{ $slug }} - Tags Tutorial | Ngodinger @endsection

@section('desc','Ngodinger adalah media yang membahas tentang tutorial dan informasi seputar dunia pemrograman. Mulai dari Artikel, Tutorial, Skill, Native dan Framework.')
@section('keys','Artikel, Tutorial, Skill, Native, Framework')
@section('auth','Diinggo Sirojudin')
@section('foto'){{url('image/index.png')}}@endsection

@section('konten') @include('layouts.iklan')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="page-header bd-1px">
				<h2>Tag: - #{{$slug}} | Tutorial</h2>
			</div>
		<!--  -->
		<div class="show-iklan">
			@yield('r728')
		</div>
		<!--  -->
			@foreach($data as $data)
			<div class="panel panel-primary app-panel">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4">
							<a href="{{url('tutor',$data->slug)}}" data-toggle="tooltip" data-placement="bottom" title="{{$data->judul}}" class="block">
								<img src="{{$data->foto}}" alt="{{$data->judul}}" class="img-tag">
							</a>
						</div>
						<div class="col-sm-8">
							<h4 class="nover-tam judul-tag"><a href="{{url('tutor',$data->slug)}}" data-toggle="tooltip" data-placement="bottom" 
								title="{{$data->deskripsi}}">{{$data->judul}}</a></h4>
							<h5 class="tag-rep">
							<?php $tags = explode(',', $data->keyword); $sluh = str_replace('-',' ',$slug); ?>
							@foreach($tags as $tag)
							@if($tag == $sluh)
								<a href="{{ url('tutor/tag/'.str_slug($tag)) }}" data-toggle="tooltip" data-placement="top" title="{{$tag}}" 
									class="label-tag">#{{ $tag }}</a>
							@else
								<a href="{{ url('tutor/tag/'.str_slug($tag)) }}" data-toggle="tooltip" data-placement="top" title="{{$tag}}" 
									class="label-gar">#{{ $tag }}</a>
							@endif
							@endforeach
							</h5>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		<!--  -->
			<div class="show-iklan">
				@yield('r728b')
			</div>
		<!--  -->
			<div class="text-center">
				{!!$pagi->render()!!}
			</div>
		</div>
	<!--  -->
		<div class="col-md-4">
			<div class="row pd-50">
			<!-- Iklan -->
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