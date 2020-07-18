@extends('layouts.admin')
@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Kategori {{ $judal->namalink }}</h1>
				</div>
			</div>
		<!--  -->
		<form method="post" action="{{ url('admin/native/'.$judal->id.'/kategori') }}">
		{{ csrf_field() }}
		{{ method_field('POST') }}
			<input type="hidden" name="linkid" value="{{ $judal->id }}">
			<div class="col-md-4 col-md-push-8">
				<button type="submit" class="btn btn-info btn-block but">Simpan Kategori</button>
				<hr>
			</div>
			<div class="col-md-8 col-md-pull-4">		
				<div class="form-group">
                	{{ Form::label('nama', 'Kategori') }}
                	{{ Form::text('kategori', null, array('class' => 'form-control','placeholder'=>'Masukkan Nama')) }}
            	</div>
            	
            	<div class="form-group">
            		{{ Form::label('nama', 'Deskripsi') }}
                	{{ Form::textarea('deskripsi', null, array('class' => 'form-control','placeholder'=>'Masukkan Deskripsi Kategori')) }}
            	</div>
			</div>
		</form>
		</div>
	</div>
@endsection