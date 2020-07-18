@extends('layouts.admin')

@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambahkan Aplikasi</h1>
				</div>
			</div>
		<!--  -->
		<form method="post" action="{{ action('aplikasicontrol@postnewapp') }}">
		{{ csrf_field() }}
			<div class="col-md-4 col-md-push-8">
				<div class="form-group">
				<label>Kembali</label>
					<a href="{{ url('admin/app') }}" class="btn btn-danger btn-block but">
						<i class="fa fa-arrow-circle-left fa-lg"></i>  |  Kembali</a>
				</div>
			</div>
		<!--  -->
			<div class="col-md-8 col-md-pull-4">
				<div class="form-group">
					<label>Kategori Native Aplikasi</label>
					<?php $for = DB::table('appmenu')->get(); ?>
					<select class="form-control" name="menuid">
							<option><-- Pilih Aplikasi --></option>
						@foreach($for as $data)
						<option value="{{ $data->id }}">{{ ucfirst($data->menu) }} - {{ $data->submenu }}</option>
						@endforeach
					</select>
				</div>
			<!--  -->
				<div class="form-group">
					<label>Nama Link</label>
					<input type="text" name="namalink" class="form-control" placeholder="Masukkan Nama Link Atau Aplikasi">
				</div>
			<!--  -->
				<div class="form-group">
					<button type="submit" class="btn btn-success">
					<i class="fa fa-save fa-lg"></i>  |  Simpan</button>
				</div>
			<!--  -->
			</div>
		</form>
		<!--  -->
		</div>
	</div>
@endsection

@section('kaki')

@endsection