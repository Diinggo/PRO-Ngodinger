@extends('layouts.aplikasi')

@section('kode'){{ $data->id }}@endsection
@section('judul'){{ $data->judul }}@endsection
@section('desc'){{ $data->deskripsi }}@endsection
@section('keys'){{ $data->keyword }}@endsection
@section('foto'){{ $data->foto }}@endsection
@section('auth'){{ $user->usernama }}@endsection

@section('publish'){{$data->created_at}}@endsection
@section('update'){{$data->updated_at}}@endsection

<?php 
$tags = explode(',', $data->keyword);
$kunjung = DB::table('tutorlog')
	->select(DB::raw('COUNT(*) as jumlah, tutorlog.ip'))
	->where('postid','=',$data->id)
	->first();
$idprev = DB::table('tutorpost')->where('id','<',$data->id)->orderBy('id','DESC')->first();
$idnext = DB::table('tutorpost')->where('id','>',$data->id)->orderBy('id','ASC')->first();
$tautan = DB::table('tutorpost')->join('tutorkategori','tutorkategori.id','=','tutorpost.tutorid')
	->where('tutorpost.id','<>',$data->id)->limit(6)->get();
?>

@section('tag')
<meta property="article:section" content="{{$kate->nama}}">
	@foreach($tags as $tg)
<meta property="article:tag" content="{{$tg}}">
	@endforeach
@endsection

@section('tau')
@foreach($tautan as $tautan)
<div class="col-md-4 col-sm-4 col-xs-6 blog-box">
	<div class="bb-head">
	<a href="{{url('tutor',$tautan->slug)}}" data-toggle="tooltip" data-placement="bottom" title="{{$tautan->judul}}">
		<img src="{{$tautan->foto}}" class="img-responsive"></a>
	</div>
	<div class="bb-body">
	<a href="{{url('tutor',$tautan->slug)}}" data-toggle="tooltip" data-placement="top" title="{{$tautan->deskripsi}}">
		<h5><b>{{$tautan->judul}}</b></h5>
	</a>
	</div>
</div>
@endforeach
@endsection

@section('konten') @include('layouts.iklan')
<body id="bgtutor">
<article class="container">
	<div class="row">
		<div class="col-md-push-4 col-md-8 blog-show">
			<div class="show-judul">
				<h1>{{ $data->judul }}</h1>
			</div>
			<hr>
			<div class="show-foto">
				<img src="{{ $data->foto }}" alt="{{ $data->judul }}">
			</div>

			<div class="show-auth">
				<div class="row">
					<div class="col-md-6 col-sm-6 prof">
						<div class="media">
							<div class="media-left">
    						<a href="{{url('author',$user->name)}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Diinggo Sirojudin">
      							<img class="media-object mfoto" src="{{$user->foto}}" alt="{{$user->usernama}}">
    						</a>
  						</div>
  							<div class="media-body">
	    						<h5 class="media-heading">Oleh 
	    						<a href="{{url('author',$user->name)}}"
	    							title="{{$user->usernama}}">{{$user->usernama}}</a>
	    						</h5>
    							<h6><span class="dates">{{date('M, d - Y.',strtotime($data->created_at))}}&nbsp;
    							Di - <a href="{{url('tutor/category',$kate->slugkat)}}" title="{{$kate->nama}}">{{$kate->nama}}</a></span>
    							</h6>
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
			<hr>
		<!-- Iklan -->
			<div class="show-iklan">
				@yield('r728')
			</div>
		<!-- Iklan -->
			<div class="show-tutor">
				<?php echo $data->konten ?>
			</div>
		<!--  -->
			<div class="text-center">
				@yield('r468')
			</div>
		<!--  -->
			<div class="show-info">
				<h5><i>Tutorial Ini telah dikunjungi Sebanyak {{ $kunjung->jumlah }} Kali</i></h5>
			</div>
			<div class="show-tag">
				<h5><b>Tags : </b>
					@foreach($tags as $tag)
						<a href="{{ url('tutor/tag/'.str_slug($tag)) }}" title="{{ $tag }}">#{{ $tag }}</a>
					@endforeach
				</h5>
			</div>
			<hr>
			<div class="konten-author">
				<h3>Sekilas Tentang Penulis :</h3>
				<div class="row">
					<div class="col-sm-4 col-md-4">
						<div class="text-center">
							<p><img src="{{$user->foto}}" class="img-responsive img-circle auth-img"></p>
						</div>
					</div>
					<div class="col-sm-8">
						<h4 class="author-name">{{$user->usernama}}</h4>
							<div class="author-desc">
								{{$user->bio}}
							</div>
							<div class="author-url">
								<a href="{{$user->link}}" title="{{$user->link}}">{{$user->link}}</a>
							</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="konten-navigasi">
  				<ul class="pager">
  					@if(!empty($idprev))
  					<li class="previous">
  						<a href="{{ url('tutor',$idprev->slug) }}" data-toggle="tooltip" data-placement="right" title="{{$idprev->judul}}">
  						<span aria-hidden="true">←</span>  Sebelumnya</a>
  					</li>@endif
  					@if(!empty($idnext))
    				<li class="next">
    					<a href="{{ url('tutor',$idnext->slug) }}" data-toggle="tooltip" data-placement="left" title="{{$idnext->judul}}">
    					Selanjutnya <span aria-hidden="true">→</span></a>
    				</li>@endif
  				</ul>
			</div><hr>
		<!--  -->
			<div class="text-center">
				@yield('r728b')
			</div>
		<!--  -->
			<div class="show-tautan">
				<h3>Baca Juga :</h3>
				<div class="row">@yield('tau')</div>
			</div><hr>
			<div class="show-komen">
				<div id="disqus_thread"></div>
			</div>
		</div>
		<div class="col-md-pull-8 col-md-4 blog-side">
			@include('layouts.sidetutor')
		</div>
	</div>
</article>
</body>
@endsection