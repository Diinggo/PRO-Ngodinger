@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ url('admin/app/'.$id.'/editkat/'.$nm) }}">
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambahkan Kategori <label class="label label-danger">{{ $datapi->namalink }}</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-3 col-md-push-9">
				<div class="form-group">
					<label>Home</label>
					<a href="{{ url('admin/app/'.$id) }}" class="btn btn-warning btn-block">
					<i class="fa fa-arrow-left fa-lg"></i>  |  Kembali</a>
				</div>
			</div>
		<!--  -->
		<input type="hidden" name="linkid" value="{{ $datapi->id }}">
			<div class="col-md-9 col-md-pull-3">
				<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" name="kategori" class="form-control" placeholder="Masukkan Nama Kategori" value="{{ $datapi->kategori }}">
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Kategori">{{ $datapi->deskripsi }}</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
					<i class="fa fa-gear fa-lg"></i>  |  Update</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection