@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ url('admin/app/'.$id.'/newkon') }}">{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambahkan Konten <label class="label label-danger">{{$datalink->namalink}}</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-sm-12">
				<a href="{{ url('admin/app/'.$id) }}" class="btn btn-danger">
					<i class="fa fa-arrow-left fa-lg"></i>&nbsp; Kembali</a>

				<button type="submit" class="btn btn-success pull-right">
					<i class="fa fa-save fa-lg"></i>&nbsp; Simpan</button>
				<hr>
			</div>
		<!--  -->
			<div class="col-md-12">
				<div class="form-group">
					<label>Masukkan Judul Konten</label>
					<input type="text" name="judul" class="form-control" placeholder="Nama Judul" required="required" autofocus="true">
				</div>
			</div>
		<!--  -->
			<div class="col-md-4 col-md-push-8">
			
				<div class="form-group">
					<label>Pilih Kategori</label>
					<?php $kat = DB::table('appkategori')->where('linkid','=',$id)->get(); ?>
					<select class="form-control" name="kategoriid" required="required">
						<option><--- Pilih Kategori --></option>
						@foreach($kat as $datakate)
						<option value="{{$datakate->id}}">{{$datakate->kategori}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Masukkan Nama Pada SideBar</label>
					<input type="text" name="sidejudul" class="form-control" placeholder="Nama Side Bar" required="required">
				</div>

				<div class="form-group">
					<label>Masukkan link pada Addres Bar</label>
					<input list="bar" type="text" name="slugside" class="form-control" placeholder="Nama Addres Bar">
					<datalist id="bar">
  						<option value="index">
					</datalist>
				</div>

				<div class="form-group">
				<label>Pilih Foto</label>
				<label class="label label-danger">Berikan Cover foto indah ukuran 750px x 420px </label>
					<a href="{{ url('/') }}/plugin/filemanager/dialog.php?type=2&field_id=cover&akey=e82bee55b911bdcf1649ba2c27c737fb" class="btn btn-info btn-block btn-iframe">Pilih Sampul Foto</a>
					<img id="fotocover" src="{{ url('image/default.png') }}" width="100%" style="max-height:200px;">
					<input type="hidden" name="foto" class="form-control" id="cover" value="{{ url('image/default.png') }}">
				</div>
			</div>
			<div class="col-md-8 col-md-pull-4">

				<div class="form-group">
					<label>Konten</label>
					<textarea id="text-control" class="form-control" name="konten"></textarea>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection