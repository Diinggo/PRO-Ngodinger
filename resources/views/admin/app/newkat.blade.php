@extends('layouts.admin')

@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambahkan Kategori <label class="label label-danger">{{ $datapi->namalink }}</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-4 col-md-push-8">
				<div class="form-group">
					<label>Home</label>
					<a href="{{ url('admin/app/'.$datapi->id) }}" class="btn btn-danger btn-block">
					<i class="fa fa-arrow-left fa-lg"></i>  |  Kembali</a>
				</div>
			</div>
		<!--  -->
		<form method="post" action="{{ url('admin/app/'.$datapi->id.'/newkat') }}">{{ csrf_field() }}
		<input type="hidden" name="linkid" value="{{ $datapi->id }}">
			<div class="col-md-8 col-md-pull-4">
				<div class="form-group">
					<label>Nama Kategori</label>
					<input type="text" name="kategori" class="form-control" placeholder="Masukkan Nama Kategori">
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Kategori"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-success"><i class="fa fa-save fa-lg"></i>  |  Tambahkan</button>
				</div>
			</div>
		</form>
		</div>
	</div>
@endsection