@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ url('admin/app/'.$id.'/editkon/'.$datakonten->id) }}">{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Edit Konten <label class="label label-danger">{{$datalink->namalink}}</label></h1><label class="label label-info">{{$datakonten->sidejudul}}</label>
				</div>

					<a href="{{ url('admin/app/'.$id) }}" class="btn btn-danger">
						<i class="fa fa-arrow-left fa-lg"></i>&nbsp; Kembali</a>

					<button type="submit" class="btn btn-info pull-right">
						<i class="fa fa-cloud-upload fa-lg"></i>&nbsp; Update</button>
				<hr>
			</div>
		<!--  -->

			<div class="col-md-4 col-md-push-8">
				<div class="form-group">
					<label>Pilih Kategori</label>
					<?php $kat = DB::table('appkategori')->where('linkid','=',$id)->get(); ?>
					<select class="form-control" name="kategoriid">
						<option><--- Pilih Kategori --></option>
						@foreach($kat as $datakate)
						@if($datakonten->kategoriid == $datakate->id)
						<option value="{{$datakate->id}}" selected="selected">{{$datakate->kategori}}</option>
						@else
						<option value="{{$datakate->id}}">{{$datakate->kategori}}</option>
						@endif
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Masukkan Nama Pada SideBar</label>
					<input type="text" name="sidejudul" class="form-control" placeholder="Nama Side Bar" value="{{$datakonten->sidejudul}}">
				</div>

				<div class="form-group">
					<label>Masukkan link pada Addres Bar</label>
					<input list="bar" type="text" name="slugside" class="form-control" placeholder="Nama Addres Bar" value="{{$datakonten->slugside}}">
					<datalist id="bar">
  						<option value="index">
					</datalist>
				</div>

				<div class="form-group">
				<label>Pilih Foto</label>
				<label class="label label-danger">Berikan Cover foto indah ukuran 750px x 420px </label>
					<a href="{{ url('/') }}/plugin/filemanager/dialog.php?type=2&field_id=cover" class="btn btn-info btn-block btn-iframe">Pilih Sampul Foto</a>
					<img id="fotocover" src="{{ $datakonten->foto }}" width="100%" style="max-height:200px;">
					<input type="hidden" name="foto" id="cover" value="{{ $datakonten->foto }}">
				</div>
			</div>
			<div class="col-md-8 col-md-pull-4">
				
				<div class="form-group">
					<label>Masukkan Judul Konten</label>
					<input type="text" name="judul" class="form-control" placeholder="Nama Judul" value="{{$datakonten->judul}}">
				</div>

				<div class="form-group">
					<label>Konten</label>
					<textarea id="text-control" class="form-control" name="konten">{{ htmlspecialchars($datakonten->konten) }}</textarea>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
