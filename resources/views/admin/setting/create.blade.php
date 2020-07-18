@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ action('settingcontrol@store') }}">
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambah <label class="label label-info">Setting</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-12">
				<a href="{{url('admin/setting')}}" class="btn btn-danger">
					<i class="fa fa-arrow-left fa-lg"></i>  Kembali</a>
		
				<button type="submit" name="publish" class="btn btn-success pull-right">
					<i class="fa fa-save fa-lg"></i>&nbsp; Publish</button>
			<hr>
			</div>
		<!--  -->
			<div class="col-md-12">
				<div class="form-group">
					<label>Judul skill</label>
					<input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required="required"
					autofocus="true" autocomplete="false">
				</div>
			</div>
		<!--  -->
			<div class="col-md-4 col-md-push-8">
				<div class="form-group">
					<label>Slug Link</label>
					<input type="text" name="slug" class="form-control" placeholder="Masukkan slug Link" 
						required="required" autofocus="true" autocomplete="false">
				</div>
			</div>
			<div class="col-md-8 col-md-pull-4">
				<div class="form-group">
					<label>Konten</label>
					<textarea name="konten" id="text-control" class="form-control" style="min-height:500px;">{{old('konten')}}</textarea>
				</div>
			</div>		
		</div>
	</div>
</form>
@endsection