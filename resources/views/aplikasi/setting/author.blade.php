@extends('layouts.aplikasi')

@section('judul'){{$data->usernama}}@endsection
@section('desc'){{$data->bio}}@endsection
@section('foto'){{$data->foto}}@endsection

@section('style')
	<style type="text/css">
	#nduwur { background: url('{{url('assets/images/back.jpg')}}') no-repeat fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover; }
	</style>
@endsection

@section('konten')
<div id="nduwur">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<center>
			<img src="{{$data->foto}}" class="img-responsive img-thumbnail" style="width:200px;height:200px;border-radius:100%;margin-top:60px;margin-bottom:60px;">
			</center>
			</div>
		</div>
	</div>
</div>

<div style="background-color:#fff">
	<div class="container">
		<div class="row" style="padding-top:20px;padding-bottom:20px;">
			<div class="col-md-12 text-center">
				<h1>{{$data->usernama}}</h1>
				{{$data->bio}}
				<hr class="bd-1px">
				<div class="row">
					<div class="col-md-3 col-sm-6 form-group">
						<a href="{{$data->fb}}" target="_blank" class="btn btn-primary btn-block">Facebook</a>
					</div>
					<div class="col-md-3 col-sm-6 form-group">
						<a href="{{$data->tw}}" target="_blank" class="btn btn-info btn-block">Twitter</a>
					</div>
					<div class="col-md-3 col-sm-6 form-group">
						<a href="{{$data->ig}}" target="_blank" class="btn btn-danger btn-block">Instagram</a>
					</div>
					<div class="col-md-3 col-sm-6 form-group">
						<a href="{{$data->link}}" target="_blank" class="btn btn-success btn-block">Website</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection