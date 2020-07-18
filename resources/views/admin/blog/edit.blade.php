@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ action('blogcontrol@update',$data->id) }}">
{{ csrf_field() }}
{{ method_field('PUT') }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Edit <label class="label label-info">Artikel</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-12">
				<a href="{{url('admin/blog')}}" class="btn btn-danger">
					<i class="fa fa-arrow-left fa-lg"></i>  Kembali</a>

				<button type="submit" name="publish" class="btn btn-info pull-right">
					<i class="fa fa-cloud-upload"></i>&nbsp; Update
				</button>
			<hr>
			</div>
		<!--  -->
			<div class="col-md-12">
				<div class="form-group">
					<label>Judul Artikel</label>
					<input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" 
						required="required" autofocus="true" autocomplete="false" value="{{$data->judul}}">
				</div>
			</div>

			<div class="col-md-4 col-md-push-8">

				<div class="form-group">
				<label>Pilih Foto</label>
						<img id="fotocover" src="{{ $data->foto }}" width="100%" style="max-height:200px;">
						<input type="hidden" name="foto" id="cover" value="{{ $data->foto }}">
						<a href="{{ url('/') }}/plugin/filemanager/dialog.php?type=2&field_id=cover&akey=e82bee55b911bdcf1649ba2c27c737fb" class="btn btn-info btn-block btn-iframe">Pilih Sampul Foto</a>
				</div>

				<div class="form-group">
					<label>Kategori</label>
					<select id="select" name="kategoriid" class="form-control" required="required">
						<option value=""><-- Pilih Kategori --></option>
						@foreach($dat1 as $dat1) @if($dat1->id == $data->kategoriid)
						<option value="{{$dat1->id}}" selected>{{$dat1->nama}}</option> @else
						<option value="{{$dat1->id}}">{{$dat1->nama}}</option>@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Deskripsi</label>
					<label class="label label-info">Deskripsi digunakan SEO deskripsi</label>
					<textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi" 
						required="required" maxlength="160" rows="5">{{$data->deskripsi}}</textarea>
				</div>
				
				<div class="form-group">
					<label>Masukkan Keyword Tags</label>
					<label class="label label-danger">Digunakan Untuk SEO Keywords</label>
					<textarea id="tags" name="keyword" class="form-control" placeholder="Masukkan Keyword Tags">
						{{ $data->keyword }}
					</textarea>
				</div>

			</div>
		<!--  -->
			<div class="col-md-8 col-md-pull-4">

				<div class="form-group">
					<label>Konten</label>
					<textarea name="konten" id="text-control" class="form-control" min-height="700">
					{{{ htmlspecialchars($data->konten) }}}</textarea>
				</div>

			</div>		
		<!--  -->
		</div>
	</div>
</form>
@endsection