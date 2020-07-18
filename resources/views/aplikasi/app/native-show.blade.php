@extends('layouts.aplikasi')

@section('kode'){{ $data->id }}@endsection
@section('judul'){{ $data->judul }}@endsection
@section('desc'){{ substr($data->konten, 0, 159) }}@endsection
@section('keys'){{ $data->kategori }}@endsection
@section('foto'){{ $data->foto }}@endsection
@section('auth','Ngodinger')

@section('publish'){{$data->created_at}}@endsection
@section('update'){{$data->updated_at}}@endsection

<?php 
$kat = DB::table('appkategori')
	->join('applink','applink.id','=','appkategori.linkid')
	->select('appkategori.*')
	->where('applink.sluglink','=',$nama)->get();

$net = DB::table('appkonten')
	->join('appkategori','appkategori.id','=','appkonten.kategoriid')
	->join('applink','applink.id','=','appkategori.linkid')
	->where('applink.sluglink','=',$nama)
	->where('appkategori.id','=',$data->kategoriid)
	->where('appkonten.id','<',$data->id)
	->orderBy('appkonten.id','DESC')
	->select('appkonten.*')->first();

if (empty($net)) {
	$net = DB::table('appkonten')
	->join('appkategori','appkategori.id','=','appkonten.kategoriid')
	->join('applink','applink.id','=','appkategori.linkid')
	->where('applink.sluglink','=',$nama)
	->where('appkategori.id','<',$data->kategoriid)
	->orderBy('appkonten.id','DESC')
	->select('appkonten.*')->first();
}

$prv = DB::table('appkonten')
	->join('appkategori','appkategori.id','=','appkonten.kategoriid')
	->join('applink','applink.id','=','appkategori.linkid')
	->where('applink.sluglink','=',$nama)
	->where('appkategori.id','=',$data->kategoriid)
	->where('appkonten.id','>',$data->id)
	->orderBy('appkategori.id','ASC')
	->select('appkonten.*')->first();
if (empty($prv)) {
	$prv = DB::table('appkonten')
	->join('appkategori','appkategori.id','=','appkonten.kategoriid')
	->join('applink','applink.id','=','appkategori.linkid')
	->where('applink.sluglink','=',$nama)
	->where('appkategori.id','>',$data->kategoriid)
	->select('appkonten.*')->first();
}
?>
@section('nav')
	<ul class="pager">
		<li class="previous">
			@if($net == null)
			<a href="{{url('native')}}" 
				data-toggle="tooltip" data-placement="right" title="Native">
					<i class="fa fa-arrow-circle-o-left fa-lg"></i>  Prev</a>
			@elseif($net->slugside == 'index')
			<a href="{{url('native',$nama)}}" 
				data-toggle="tooltip" data-placement="right" title="{{$nama}}">
					<i class="fa fa-arrow-circle-o-left fa-lg"></i>  Prev</a>
			@else
			<a href="{{url('native/'.$nama.'/'.$net->slugside)}}" 
				data-toggle="tooltip" data-placement="right" title="{{$net->judul}}">
					<i class="fa fa-arrow-circle-o-left fa-lg"></i>  Prev</a>
			@endif
		</li>
		<li class="next">
			@if(!empty($prv))
			<a href="{{url('native/'.$nama.'/'.$prv->slugside)}}" 
				data-toggle="tooltip" data-placement="left" title="{{$prv->judul}}"> 
					Next  <i class="fa fa-arrow-circle-right fa-lg"></i></a>
			@else
			<a href="{{url('native/'.$nama)}}" 
				data-toggle="tooltip" data-placement="left" title="Native {{$nama}}">
			 		Next  <i class="fa fa-arrow-circle-right fa-lg"></i></a>
			@endif
		</li>
	</ul>
@endsection

@section('title'){{$data->judul}}@endsection

@section('konten') @include('layouts.iklan')
	<div class="container-fluid">
		<div class="row">
		<!--  -->
			<div class="col-md-6 col-md-push-3 col-sm-12 app-body">

				<div class="app-judul">
					<h1 class="text-center">{{$data->judul}}</h1>
				</div>

				<hr class="hr-nol">

				<div class="app-nav">
	  				@yield('nav')
				</div><hr class="hr-nol">

				<div class="app-iklan">
					@yield('r728')
				</div><hr class="hr-nol">

				<div class="app-konten">
					<?php echo $data->konten ?>
				</div>

				<div class="app-iklan">
					@yield('r468')
				</div>
				<hr class="hr-nol">

				<div class="app-nav">
	  				@yield('nav')
				</div>

				<hr class="hr-nol">
				<div class="app-iklan">
					@yield('r600')
				</div>
				
				<!-- <hr class="hr-nol"> -->
				<!-- Disqus Comment -->
				<!-- <div id="disqus_thread"></div> -->
				<hr class="hr-nol" id="sidemenu">

			</div>
		<!-- Side Bar -->
			<div class="col-md-3 col-md-pull-6 col-sm-6 pd-30" id="sidemenu">
				<div class="form-group">
					<a href="{{url('native')}}" class="btn btn-primary btn-block btn-border btn-lg" title="Native">Native</a>
				</div>
				@foreach($kat as $kat) <?php $subkat = DB::table('appkonten')->where('kategoriid','=',$kat->id)->get(); ?>
					<div class="panel panel-primary app-panel">
						<div class="panel-heading"><b>{{$kat->kategori}}</b></div>
						<div class="list-group">
						@foreach($subkat as $subkat)
							@if($subkat->slugside == 'index')
								@if($slug == null)
									<a href="{{url('native/'.$nama)}}"
										data-toggle="tooltip" data-placement="top" title="{{$subkat->sidejudul}}"
											class="list-group-item active">{{$subkat->sidejudul}}</a>
								@elseif($slug == 'index')
									<a href="{{url('native/'.$nama)}}" 
										data-toggle="tooltip" data-placement="top" title="{{$subkat->sidejudul}}"
											class="list-group-item active">{{$subkat->sidejudul}}</a>
								@else
									<a href="{{url('native/'.$nama)}}"
										data-toggle="tooltip" data-placement="top" title="{{$subkat->sidejudul}}"
											class="list-group-item">{{$subkat->sidejudul}}</a>
								@endif
							@elseif($subkat->slugside == $slug)
								<a href="{{url('native/'.$nama.'/'.$subkat->slugside)}}"
									data-toggle="tooltip" data-placement="top" title="{{$subkat->sidejudul}}"
										class="list-group-item active">{{$subkat->sidejudul}}</a>
							@else
								<a href="{{url('native/'.$nama.'/'.$subkat->slugside)}}"
									data-toggle="tooltip" data-placement="top" title="{{$subkat->sidejudul}}"
										class="list-group-item">{{$subkat->sidejudul}}</a>
							@endif
						@endforeach
						</div>
					</div>
				@endforeach
				<div class="app-iklan">
					@yield('c300')
				</div>
			</div>
		<!--  -->
			<div class="col-md-12 hidden-sm hidden-md hidden-lg">
				<hr class="hrbatas">
			</div>
		<!--  -->
			<div class="col-md-3 col-sm-6 pd-30">
				@include('layouts.sideapp')
			</div>
		<!--  -->
		</div>
	</div>
@endsection

@section('kaki')
	<a href="#sidemenu" id="to-menu" class="btn btn-primary to-menu hidden-lg hidden-md"><i class="fa fa-navicon fa-lg"></i></a>
@endsection