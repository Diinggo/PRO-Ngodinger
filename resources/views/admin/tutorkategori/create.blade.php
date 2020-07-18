@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ action('tutorkategoricontrol@store') }}">
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambah Kategori</h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-4 col-md-push-8">
				<div class="form-group">
					<label>Home</label>
					<a href="{{ url('admin/kategori') }}" class="btn btn-danger btn-block but">
					<i class="fa fa-arrow-circle-left fa-lg"></i>  |  Kembali</a>
				</div>
			</div>
			<div class="col-md-8 col-md-pull-4">
				
				<div class="form-group">
					<label>Nama</label>
                	<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required="required" value="{{ old('nama') }}">
            	</div>

            	<div class="form-group">
            		<label>Deskripsi</label>
            		<textarea name="diskrip" class="form-control" placeholder="Masukkan Deskripsi Kategori">{{ old('diskrip') }}</textarea>
            	</div>

            	<div class="form-group">
            		<button type="submit" class="btn btn-success but"><i class="fa fa-save fa-lg"></i>  |  Simpan</button>
            	</div>
			</div>		
		</div>
	</div>
</form>
@endsection