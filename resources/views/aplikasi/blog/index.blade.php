@extends('layouts.aplikasi')

@section('utm','?utm_source=ngodinger&utm_medium=new_article&utm_campaign=artikel_loop')

@section('judul','Artikel - Ngodinger : Tutorial dan Informasi Seputar Dunia Pemrograman')

@section('desc','Artikel membahas tentang dunia tools, update, rilis, informasi, tokoh, search-engine, advertising, template, tema dan masih banyak lagi.')

@section('keys','Artikel, Tools. Update, Tokoh, SEO')

@section('auth','Diinggo Sirojudin')

@section('foto'){{url('image/index.png')}}@endsection

@section('tag')
<meta property="article:section" content="Artikel">
@endsection

@section('konten') @include('layouts.iklan')

@if(empty($_GET['page']) or $_GET['page'] == '1')
<!-- Popular Artikel -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Welcome To Article Ngodinger</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
			<a href="{{url('blog',$most->slug)}}@yield('utm')" title="{{$most->judul}}">
				<div class="blog-large">
					<div class="blog-head">
						<img src="{{$most->foto}}" alt="{{$most->judul}}">
					</div>
					<div class="blog-body">
						<a href="{{url('blog/category',$most->slugkat)}}"  title="{{$most->nama}}" class="blog-badge">{{$most->nama}}</a>
						<a href="{{url('blog',$most->slug)}}@yield('utm')" title="{{$most->judul}}">
							<h3>{{$most->judul}}</h3>
						</a>
						<span class="blog-span">{{date('M d, Y',strtotime($most->created_at))}}</span>
					</div>
				</div>
			</a>
			</div>
			@foreach($more as $more)
			<div class="col-md-3 col-sm-6">
			<a href="{{url('blog',$more->slug)}}@yield('utm')" title="{{$more->judul}}">
				<div class="blog-small">
					<div class="blog-head">
						<img src="{{ $more->foto }}" alt="{{ $more->judul }}" />
					</div>
					<div class="blog-body">
						<a href="{{url('blog/category',$more->slugkat)}}"  title="{{$more->nama}}" class="blog-badge">{{$more->nama}}</a>
						<a href="{{url('blog',$more->slug)}}@yield('utm')" title="{{$more->judul}}">
							<h5>{{$more->judul}}</h5>
						</a>
						<span class="blog-span">{{date('M d, Y',strtotime($more->created_at))}}</span>
					</div>
				</div>
			</a>
			</div>
			@endforeach
		</div>
	</div>
	<!-- New Artikel -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<blockquote class="new">
					<h4>Artikel Terbaru</h4>
				</blockquote>
			</div>
		</div>
	<!--  -->
	<!-- Iklan -->
		<div class="row">
			<div class="col-sm-6 col-md-4 show-iklan">
				@yield('r300')
			</div>
			<div class="col-sm-6 col-md-4 col-md-push-4 show-iklan">
				@yield('r300b')
			</div>
			<div class="col-sm12 col-md-4 col-md-pull-4 show-iklan">
				@yield('c300')
			</div>
		</div>
	<!-- Iklan -->
		<div class="row">
		@foreach($data as $data)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('blog',$data->slug)}}@yield('utm')" data-toggle="tooltip" data-placement="bottom" title="{{$data->judul}}" class="head-link">
					<div class="box-img">
						<img src="{{$data->foto}}" alt="{{$data->judul}}" />
					</div></a>
					<div class="box-cat">
						<a href="{{url('blog/category',$data->slugkat)}}" data-toggle="tooltip" data-placement="bottom" title="{{$data->diskripsi}}">{{$data->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">{{ date('M d, Y.',strtotime($data->created_at))}}</div>
					<div class="box-title">
						<a href="{{url('blog',$data->slug)}}@yield('utm')" data-toggle="tooltip" data-placement="top" title="{{$data->deskripsi}}" class="title-link">
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
<!-- Iklan -->
		<div class="row">
			<div class="col-md-12">
			<center>{!! $data1->render() !!}</center>
			</div>
		</div>
	</div>
@else
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<blockquote class="new">
					<h4>Artikel Sebelumnya</h4>
				</blockquote>
			</div>
		</div>
	<!-- Iklan -->
		<!-- Iklan -->
		<div class="row">
			<div class="col-sm-6 col-md-4 show-iklan">
				@yield('r300')
			</div>
			<div class="col-sm-6 col-md-4 col-md-push-4 show-iklan">
				@yield('r300b')
			</div>
			<div class="col-sm12 col-md-4 col-md-pull-4 show-iklan">
				@yield('c300')
			</div>
		</div>
	<!-- Iklan -->
	<!--  -->
		<div class="row">
		@foreach($data as $data)
		<div class="col-md-3 col-sm-4">
			<div class="box box-small">
				<div class="box-head">
					<a href="{{url('blog',$data->slug)}}@yield('utm')" data-toggle="tooltip" data-placement="bottom" title="{{$data->judul}}" class="head-link">
					<div class="box-img">
						<img src="{{$data->foto}}" alt="{{$data->judul}}" />
					</div></a>
					<div class="box-cat">
						<a href="{{url('blog/category',$data->slugkat)}}" data-toggle="tooltip" data-placement="bottom" title="{{$data->diskripsi}}">{{$data->nama}}</a>
					</div>
				</div>
				<div class="box-body">
					<div class="box-date">{{ date('M d, Y.',strtotime($data->created_at))}}</div>
					<div class="box-title">
						<a href="{{url('blog',$data->slug)}}@yield('utm')" data-toggle="tooltip" data-placement="top" title="{{$data->deskripsi}}" class="title-link">
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
			<div class="col-md-12">
				<div class="show-iklan">
					@yield('r728')
				</div>
			</div>
		</div>
	<!--  -->
		<div class="row">
			<div class="col-md-12">
			<center>{!! $data1->render() !!}</center>
			</div>
		</div>
	</div>
@endif
@endsection