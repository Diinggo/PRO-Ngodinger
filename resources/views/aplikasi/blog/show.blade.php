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
$kunjung = DB::table('bloglog')
	->select(DB::raw('COUNT(*) as jumlah, bloglog.ip'))
	->where('blogid','=',$data->id)
	->first();
$idprev = DB::table('blogpost')->where('id','<',$data->id)->orderBy('id','DESC')->first();
$idnext = DB::table('blogpost')->where('id','>',$data->id)->orderBy('id','ASC')->first();
$tautan = DB::table('blogpost')->join('blogkategori','blogkategori.id','=','blogpost.kategoriid')
	->where('blogpost.id','<>',$data->id)->limit(6)->get();
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
	<a href="{{url('blog',$tautan->slug)}}" data-toggle="tooltip" data-placement="bottom" title="{{$tautan->judul}}">
		<img src="{{$tautan->foto}}" class="img-responsive"></a>
	</div>
	<div class="bb-body">
	<a href="{{url('blog',$tautan->slug)}}" data-toggle="tooltip" data-placement="top" title="{{$tautan->deskripsi}}">
		<h5><b>{{$tautan->judul}}</b></h5>
	</a>
	</div>
</div>
@endforeach
@endsection

@section('konten') @include('layouts.iklan')
<body id="bg">
<article class="container">
	<div class="row">
		<div class="col-md-8 blog-show">
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
	    						<h5 class="media-heading">Oleh <a href="{{url('author',$user->name)}}" title="{{$user->usernama}}">{{$user->usernama}}</a>
	    						</h5>
    							<h6><span class="dates">{{date('M, d - Y.',strtotime($data->created_at))}}&nbsp;
    							Di - <a href="{{url('blog/category',$kate->slugkat)}}" title="{{$kate->nama}}">{{$kate->nama}}</a>
    							</span>
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
			<div class="text-center">
				@yield('r728')
			</div>
			<!--  -->
			<div class="show-body">
			<?php $pisah = $data->konten; $pecah = explode('<p>{[break]}</p>', $pisah); ?>
			<?php 	if (!empty($pecah[0])) { echo $pecah[0]; ?> @yield('r728c')<?php } ?>
			<?php 	if (!empty($pecah[1])) { echo $pecah[1]; ?> @yield('r300c') <?php } ?>
			<?php 	if (!empty($pecah[2])) { echo $pecah[2]; ?> @yield('r468') <?php } ?>
			<?php 	if (!empty($pecah[3])) { echo $pecah[3]; }; ?>
			</div>
		<!-- Iklan -->
			<div class="show-iklan">
				
			</div>
		<!--  -->
			<div class="show-info">
				<h5><i>Artikel Ini telah dikunjungi Sebanyak {{ $kunjung->jumlah }} Kali</i></h5>
			</div>
			<div class="show-tag">
				<h5><b>Tags : </b>
					@foreach($tags as $tag)
						<a href="{{ url('blog/tag/'.str_slug($tag)) }}" title="{{ $tag }}">#{{ $tag }}</a>
					@endforeach
				</h5>
			</div>
			<hr>
			<div class="konten-author">
				<h3>Sekilas Tentang Penulis :</h3>
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
  						<a href="{{ url('blog',$idprev->slug) }}" data-toggle="tooltip" data-placement="right" title="{{$idprev->judul}}">
  						<span aria-hidden="true">←</span>  Sebelumnya</a>
  					</li>@endif
  					@if(!empty($idnext))
    				<li class="next">
    					<a href="{{ url('blog',$idnext->slug) }}" data-toggle="tooltip" data-placement="left" title="{{$idnext->judul}}">
    					Selanjutnya <span aria-hidden="true">→</span></a>
    				</li>@endif
  				</ul>
			</div><hr>
		<!--  -->
			<div class="show-tautan">
			<!-- Iklan -->
				<div class="text-center">
					@yield('r728b')
				</div>
			<!--  -->
				<h3>Baca Juga :</h3>
				<div class="row">@yield('tau')</div>
			</div><hr>
			<div class="show-komen">
				<div id="disqus_thread"></div>
			</div>
		</div>
		<div class="col-md-4 blog-side">
			@include('layouts.sideblog')
		</div>
	</div>
</article>
</body>
@endsection