@extends('layouts.aplikasi')

@section('kode'){{ $data->id }}@endsection
@section('judul'){{ $data->judul }}@endsection
@section('desc'){{ $data->deskripsi }}@endsection
@section('keys'){{ $data->keyword }}@endsection
@section('foto'){{ $data->foto }}@endsection
@section('auth'){{ $user->usernama }}@endsection

@section('publish'){{$data->created_at}}@endsection
@section('update'){{$data->updated_at}}@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{url('assets/element/mediaelementplayer.min.css')}}">
@endsection

@section('script')
<script src="{{url('assets/element/mediaelement-and-player.min.js')}}"></script>
	<script type="text/javascript">
	$('audio,video').mediaelementplayer({
		features: ['playpause','current','progress','duration','volume','speed','fullscreen','postroll','ads'],
		success: function(player, node) {
			$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
		}
	});
	</script>
@endsection

<?php 
$tags = explode(',', $data->keyword);
$kunjung = DB::table('skilllog')
	->select(DB::raw('COUNT(*) as jumlah, skilllog.ip'))
	->where('postid','=',$data->id)
	->first();
?>

@section('tag')
<meta property="article:section" content="{{$kate->nama}}">
	@foreach($tags as $tg)
<meta property="article:tag" content="{{$tg}}">
	@endforeach
@endsection

@section('konten') @include('layouts.iklan')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12 skill-video">
					<video width="640" height="360" style="width: 100%; height: 100%; margin-bottom:10px;" 
						id="videos"
						controls="controls"
						preload="none"
						poster="{{$data->foto}}" >

						<source type="video/youtube" src="{{$data->video}}">
						<link rel="postroll" href="{{url('skill/postroll')}}">
					</video>
					<div class="iklan-skill">
						@yield('r728')
					</div>
				</div>
			<!--  -->
				<div class="col-md-12 skill-judul">
					<h1>{{$data->judul}}</h1>
					<div class="row">
						<div class="col-md-6 col-sm-6 prof">
							<div class="media">
							<div class="media-left">
	    						<a href="{{url('author',$user->name)}}" 
	    							data-toggle="tooltip" data-placement="bottom" title="{{$user->usernama}}">
	      							<img class="media-object mfoto" src="{{$user->foto}}" alt="{{$user->foto}}">
	    						</a>
	  						</div>
	  							<div class="media-body">
		    						<h5 class="media-heading">Oleh <a href="{{url('author',$user->name)}}" title="{{$user->usernama}}">{{$user->usernama}}</a> || {{$kunjung->jumlah}}x Views
		    						</h5>
	    							<h6><span class="dates">
	    								{{date('M d, Y.',strtotime($data->created_at))}}&nbsp;
	    								Di - <a href="{{url('skill/category',$kate->slugkat)}}" title="{{$kate->nama}}">{{$kate->nama}}</a>
	    								</span></h6>
	  							</div>
	  						</div>
						</div>
						<div class="col-md-6 col-sm-6 prof">
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_inline_share_toolbox_6qw6"></div>
							<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57c7c751e95726a6"></script>
						</div>
					</div>
				</div>
			<!--  -->
				<div class="col-md-12 skill-tag show-tag">
					<h5 class="no-margin"><b>Tags : </b>
						@foreach($tags as $tag)
							<a href="{{ url('skill/tag/'.str_slug($tag)) }}" title="{{ $tag }}">#{{ $tag }}</a>
						@endforeach
					</h5>
				</div>
			<!--  -->
				<div class="col-md-12 skill-body">
					<ul class="nav nav-tabs" role="tablist">
  						<li role="presentation" class="active">
  							<a href="#deskripsi" role="tab" data-toggle="tab" aria-controls="deskripsi">Deskripsi</a></li>
  						<li role="presentation">
  							<a href="#comment" aria-controls="comment" role="tab" data-toggle="tab">Comment</a></li>
					</ul>
				<!--  -->
					<div class="tab-content">
    					<div role="tabpanel" class="tab-pane fade active in" id="deskripsi">
    						<div class="show-iklan">
    							@yield('r728b')
    						</div>
    						<div class="show-body">
    							<?php echo $data->konten ?>
    						</div>
    						<div class="show-iklan text-center">
    							@yield('c550')
    						</div>
    					</div>
    					<div role="tabpanel" class="tab-pane fade" id="comment">
    						<div class="text-center">
    							@yield('r728c')
    						</div>
    						<hr>
    						<div id="disqus_thread"></div>
    					</div>
  					</div>
			<!--  -->
				</div>
			</div>
		</div>
	<!--  -->
		<div class="col-md-4 skillside">
			@include('layouts.sideskill')
		</div>
	</div>
</div>
@endsection