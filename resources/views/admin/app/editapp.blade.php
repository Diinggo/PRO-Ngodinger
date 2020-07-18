@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ url('admin/app/edit/'.$data->id) }}">
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h2><div class="label label-danger">Edit</div> Aplikasi</h2>
				</div>
			</div>
		<!--  -->
			<div class="col-md-4 col-md-push-8">
				<div class="form-group">
				<label>Kembali</label>
					<a href="{{ url('admin/app') }}" class="btn btn-danger btn-block but">
						<i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Kembali</a>
				</div>
			</div>
		<!--  -->
			<div class="col-md-8 col-md-pull-4">
				<div class="form-group">
					<label>Kategori Native Aplikasi</label>
					<select class="form-control" name="menuid" required="required">
						<option><-- Pilih Aplikasi --></option>
						@foreach($dat1 as $dat1) @if($dat1->id == $data->menuid)
						<option value="{{ $dat1->id }}" selected="selected">{{ ucfirst($dat1->menu) }} - {{ $dat1->submenu }}</option>@else
						<option value="{{ $dat1->id }}">{{ ucfirst($dat1->menu) }} - {{ $dat1->submenu }}</option>
						@endif @endforeach
					</select>
				</div>
			<!--  -->
				<div class="form-group">
					<label>Nama Link</label>
					<input type="text" name="namalink" class="form-control" placeholder="Masukkan Nama Link Atau Aplikasi" 
						value="{{$data->namalink}}" required="required">
				</div>
			<!--  -->
				<div class="form-group">
					<input type="submit" name="save" class="btn btn-primary" value="Update Aplikasi">
				</div>
			<!--  -->
			</div>
		</div>
	</div>
</form>
@endsection