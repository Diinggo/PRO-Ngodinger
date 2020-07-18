<?php
	$terk = DB::table('skillpost')->join('skillkategori','skillkategori.id','=','skillpost.skillid')
	->select('skillkategori.*','skillpost.*')
	->where('skillkategori.id','=',$data->skillid)->where('skillpost.id','!=',$data->id)
	->orderBy('skillpost.id','DESC')->limit(5)->get();

	$popu = DB::table('skillpost')
    ->join('skilllog','skilllog.postid','=','skillpost.id')
    ->select('skillpost.*', DB::raw('COUNT(*) as jumlah, skilllog.postid'))
    ->orderBy('jumlah','DESC')
    ->groupBy('skillpost.id')->limit(5)->get();

    $terb = DB::table('skillpost')->orderBy('id','DESC')->limit(5)->get();
?>
<div class="row">
	<div class="col-sm-6 col-md-11 col-md-offset-1">
		<div class="show-iklan">
			@yield('c300')
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 col-md-offset-1 sidekill">
		<h3 class="skillterkait">Skill Terkait</h3>
		@if(!empty($terk))
		@foreach($terk as $terk)
		<div class="media mg-30">
  			<div class="media-left skill1">
    			<a href="{{url('skill',$terk->slug)}}">
      				<img class="media-object" src="{{$terk->foto}}" alt="{{$terk->judul}}">
    			</a>
  			</div>
  			<div class="media-body nover-tam">
  				<a href="{{url('skill',$terk->slug)}}">
  					<h5 class="media-heading">{{$terk->judul}}</h5>
  				</a>
			    <span class="media-waktu">{{$terk->nama}}</span>
  			</div>
		</div>
		@endforeach
		<a href="{{url('skill/category',$kate->slugkat)}}" class="btn btn-success btn-block btn-sm">Browse {{$kate->nama}}</a>
		@else
			<div class="alert alert-danger skilert">Skill Tidak Ada</div>
		@endif
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 col-md-offset-1 sidekill">
		<div class="skillpopuler">
			<h3 class="skillterkait">Skill Populer</h3>
			@foreach($popu as $popu)
			<div class="media">
	  			<div class="media-left skill1">
	    			<a href="{{url('skill',$popu->slug)}}">
	      				<img class="media-object" src="{{$popu->foto}}" alt="{{$popu->judul}}">
	    			</a>
	  			</div>
	  			<div class="media-body nover-tam">
	  				<a href="{{url('skill',$popu->slug)}}">
	  					<h5 class="media-heading">{{$popu->judul}}</h5>
	  				</a>
	    			<span class="media-waktu">{{$popu->jumlah}} Views</span>
	  			</div>
			</div>
			@endforeach
		</div>
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 col-md-offset-1 sidekill">
		<h3 class="skillterkait">Skill Terbaru</h3>
		@foreach($terb as $terb)
		<div class="media">
  			<div class="media-left skill1">
    			<a href="{{url('skill',$terb->slug)}}">
      				<img class="media-object" src="{{$terb->foto}}" alt="{{$terb->judul}}">
    			</a>
  			</div>
  			<div class="media-body nover-tam">
  				<a href="{{url('skill',$terb->slug)}}">
  					<h5 class="media-heading">{{$terb->judul}}</h5>
  				</a>
			    <span class="media-waktu">{{ date('M, d - Y.',strtotime($terb->created_at)) }}</span>
  			</div>
		</div>
		@endforeach
	</div>
<!--  -->
	<div class="col-sm-6 col-md-11 col-md-offset-1">
		<div class="panel-primary app-panel">
			<div class="panel-heading"><h4 class="populer">Official Ngodinger</h4></div>
			<div class="panel-body">@include('layouts.sosialmedia')
		</div>
		<div class="show-iklan">
			@yield('r300')
		</div>
	</div>
<!--  -->
</div>