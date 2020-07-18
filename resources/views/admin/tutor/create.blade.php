@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ action('tutorcontrol@store') }}" autocomplete="false">
{{csrf_field()}}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambah <label class="label label-info">Tutorial</label></h1>
				</div>
			</div>
		<!--  -->
		<div class="col-md-12">
			<a href="{{url('admin/tutor')}}" class="btn btn-danger">
				<i class="fa fa-arrow-left fa-lg"></i>  Kembali</a>
		
			<button type="submit" name="publish" class="btn btn-success pull-right">
				<i class="fa fa-save fa-lg"></i>&nbsp; Publish</button>
		<hr>
		</div>
		<!--  -->
			<div class="col-md-12">
				<div class="form-group">
					<label>Judul Tutorial</label>
					<input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required="required"
					autofocus="true" autocomplete="false">
				</div>
			</div>
			<div class="col-md-4 col-md-push-8">

				<div class="form-group">
					<label>Kategori</label>
					<select class="form-control" name="kategori" required="required">
						<option value=""><-- Pilih Kategori --></option>
						@foreach($data as $data)<option value="{{$data->id}}">{{$data->nama}}</option>@endforeach
					</select>
				</div>

				<div class="form-group">
				<label>Pilih Foto</label>
				<label class="label label-danger">Berikan Cover foto indah ukuran 750px x 420px </label>
					<img id="fotocover" src="{{ url('image/default.png') }}" width="100%" style="max-height:200px;">
					<a href="{{ url('/') }}/plugin/filemanager/dialog.php?type=2&field_id=cover&akey=e82bee55b911bdcf1649ba2c27c737fb" class="btn btn-info btn-block btn-iframe">Pilih Sampul Foto</a>
					<input type="hidden" id="cover" name="foto" class="form-control" value="{{url('image/default.png')}}">
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<label class="label label-warning">Deskripsi digunakan SEO deskripsi</label>
					<textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" required="required" maxlength="160" rows="5"></textarea>
				</div>

				<div class="form-group">
					<label>Keywords</label>
					<label class="label label-warning">Digunakan Untuk SEO Keywords</label>
					<textarea name="keyword" id="tags" class="form-control" placeholder="Masukkan Keyword Tags"></textarea>
				</div>
			</div>
		<!--  -->
			<div class="col-md-8 col-md-pull-4">
				<div class="form-group">
					<label>Konten</label>
					<textarea name="konten" id="text-control" class="form-control">{{old('konten')}}</textarea>
				</div>

			</div>
		</div>
	</div>
</form>
@endsection