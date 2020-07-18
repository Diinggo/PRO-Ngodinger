@extends('layouts.admin')

@section('konten')
	
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Edit Kategori <label class="label label-info">Skill</label></h1>
			</div>
		</div>
	<form method="post" action="{{ action('skillkategoricontrol@update',$data->id)}}">
	{{csrf_field()}}
	{{method_field('PUT')}}
		<div class="col-md-4 col-md-push-8">
			<div class="form-group">
				<label>Home</label>
				<a href="{{ url('admin/skillkategori') }}" class="btn btn-danger btn-block but">
				<i class="fa fa-arrow-circle-left fa-lg"></i>  |  Kembali</a>
			</div>
		</div>
		<div class="col-md-8 col-md-pull-4">
			
			<div class="form-group">
            	<label>Nama</label>
            	<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="{{$data->nama}}" required="required" autofocus="true">
        	</div>
        	
        	<div class="form-group">
        		<label>Deskripsi</label>
        		<textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">{{$data->diskripsi}}</textarea>
        	</div>

        	<div class="form-group">
        		<button type="submit" class="btn btn-primary but"><i class="fa fa-gear fa-lg"></i>  |  Update</button>
        	</div>
		</div>
	</form>
	</div>
</div>

@endsection