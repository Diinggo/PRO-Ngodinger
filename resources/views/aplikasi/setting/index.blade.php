@extends('layouts.aplikasi')

@section('judul'){{$data->judul}}@endsection
@section('desc'){{ substr($data->konten, 0, 159) }}@endsection

@section('keys','About, Disclaimer, Privacy-Police, Contact')
@section('foto'){{url('image/default.png')}}@endsection
@section('auth','Ngodinger')

@section('publish'){{$data->created_at}}@endsection
@section('update'){{$data->updated_at}}@endsection

@section('konten')
<div class="container setting">
	<div class="row">
		<div class="col-md-8 col-sm-8 col-sm-push-4">
			<div class="page-header bd-1px">
				<h1 class="no-margin">{{$data->judul}}</h1>
			</div>
			<div class="show-body">
				<?php echo($data->konten) ?>
			</div>
			<hr class="bd-1px">
		</div>
		<div class="col-md-4 col-sm-4 col-sm-pull-8">
			<div class="panel-primary mtop30">
				<div class="panel-heading"><h5 class="populer">Webmaster Ngodinger</h5></div>
				<div class="list-group">
				<?php $rep = DB::table('setting')->where('status','=','baku')->get(); ?>
				@foreach($rep as $rep)
  					<a href="{{url('',$rep->slug)}}" class="list-group-item">{{ucfirst($rep->slug)}}</a>
			  	@endforeach
				</div>
			</div>
		<!--  -->
			<div class="panel-primary mtop30">
				<div class="panel-heading"><h5 class="populer">Another Ngodinger</h5></div>
				<div class="list-group">
				<?php $ano = DB::table('setting')->where('status','=','tambah')->get(); ?>
				@foreach($ano as $ano)
  					<a href="{{url('dev',$ano->slug)}}" class="list-group-item">{{ucfirst($ano->slug)}}</a>
			  	@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection