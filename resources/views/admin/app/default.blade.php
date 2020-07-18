@extends('layouts.admin')

@section('konten')
<?php $datakat = DB::table('appkategori')->where('appkategori.linkid','=',$datalink->id)->get(); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Konten Dari <label class="label label-success">{{ $datalink->namalink }}</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-12"><div class="row">
				<div class="col-sm-4">
					<a href="{{ action('aplikasicontrol@index') }}" class="btn btn-danger">
					<i class="fa fa-arrow-left fa-lg"></i>&nbsp; Kembali</a>

					<div class="hidden-lg hidden-md hidden-sm"><hr></div>
				</div>

				<div class="col-sm-8">
					<a href="{{ url('admin/app/'.$datalink->id.'/newkat') }}" class="btn btn-info pull-right">
					<i class="fa fa-plus-circle fa-lg"></i>&nbsp;  New Kategori</a>

					<a href="@if($datakat != null){{ url('admin/app/'.$id.'/newkon')}}@endif" 
							class="btn btn-success pull-right" @if($datakat == null)disabled="disabled"@endif>
							<i class="fa fa-plus-square fa-lg"></i>&nbsp; New Konten</a>
				</div>
			</div></div>
		<!--  -->
			<div class="col-md-12 col-sm-12"><hr>
				@if($datakat == null)
					<div class="alert alert-danger">
						<h2 class="text-center">Maaf data tidak ada, mohon membuat kategori dahulu sebelum membuat konten</h2>
					</div>
				@else
				@foreach($datakat as $data)
					<div class="alert alert-info">
							<form method="post" action="{{ url('admin/app/'.$datalink->id.'/delkat/'.$data->id) }}">
								{{ csrf_field() }}
								<big>{{ $data->kategori }}</big>
								<a href="{{ url('admin/app/'.$datalink->id.'/editkat/'.$data->id) }}" class="btn label label-primary lbl">Edit</a>  |
								<button type="submit" class="btn label label-danger btn-del">Hapus</button>
							</form>
					</div>
					<?php $datakon = DB::table('appkonten')->where('appkonten.kategoriid','=',$data->id)->get(); $a=1; ?>
					 <div class="table-responsive">
					 	<table class="table table-striped table-hover">
					 		<thead>
					 			<tr>
					 				<th>NO</th>
					 				<th>Nama Side</th>
					 				<th>Nama Slug</th>
					 				<th>Judul</th>
					 				<th>Edit</th>
					 				<th>Hapus</th>
					 			</tr>
					 		</thead>
					 		<tbody>
					 		@foreach($datakon as $dtkon)
					 			<tr>
					 				<td>{{ $a++ }}</td>
					 				<td>{{ $dtkon->sidejudul }}</td>
					 				<td>{{ $dtkon->slugside }}</td>					 				
					 				<td>{{ $dtkon->judul }}</td>
					 				<td>
					 					<a href="{{ url('admin/app/'.$id.'/editkon/'.$dtkon->id) }}" class="label label-primary">Edit</a>
					 				</td>
					 				<td>
					 					<form method="post" action="{{ url('admin/app/'.$id.'/delkon/'.$dtkon->id)}}">
											{{ csrf_field() }}
											<button type="submit" class="btn label label-danger btn-del">Hapus</button>
										</form>
					 				</td>
					 			</tr>
					 		@endforeach
					 		</tbody>
					 	</table>
					 </div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
@endsection