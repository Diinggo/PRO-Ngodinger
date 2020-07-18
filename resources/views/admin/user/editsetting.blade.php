@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ action('aplikasicontrol@pedit',$data->id)}}">
{{csrf_field()}}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Edit Informasi<label class="label label-warning">User</label></h1>
			</div>
		</div>
		<!--  -->
		<div class="col-md-12">
				<a href="{{ url('admin') }}" class="btn btn-danger">
					<i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Kembali</a>
				<button type="submit" class="btn btn-success pull-right">
                    	<i class="fa fa-btn fa-user"></i> Update
                </button>
				<hr>
		</div>
		<!--  -->
			<div class="col-md-6">

	      		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                <label for="name" class="control-label">Username</label>
	                    <input id="name" type="text" class="form-control" name="name" 
	                    value="{{ $data->name }}" required="required">
	            </div>

	            <div class="form-group{{ $errors->has('usernama') ? ' has-error' : '' }}">
	                <label for="name" class="control-label">Nama Lengkap</label>
	                    <input id="name" type="text" class="form-control" name="usernama" 
	                    	value="{{ $data->usernama }}">
	            </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" 
                        value="{{ $data->email }}" required="required">
                </div>

                <div class="form-group">
                	<label>Biografi</label>
                	<textarea class="form-control" name="bio">{{$data->bio}}</textarea>
                </div>
                <div class="form-group">
                <label>Pilih Foto</label>
                	<a href="{{ url('/') }}/plugin/filemanager/dialog.php?type=2&field_id=cover&akey=e82bee55b911bdcf1649ba2c27c737fb" class="btn btn-info btn-block btn-iframe">Pilih Sampul Foto</a>
					<img id="fotocover" src="{{ $data->foto }}" width="100%">
					<input type="hidden" name="foto" id="cover" value="{{ $data->foto }}">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
                    <label for="password" class="control-label">Facebook</label>
                        <input type="text" class="form-control" name="fb" value="{{$data->fb}}">
                </div>

               <div class="form-group">
                	<label for="password-confirm" class="control-label">Twitter</label>
                    <input type="text" class="form-control" name="tw" value="{{$data->tw}}">
                </div>

                <div class="form-group">
                	<label for="password-confirm" class="control-label">Instagram</label>
                    <input type="text" class="form-control" name="ig" value="{{$data->ig}}">
                </div>

                <div class="form-group">
                	<label for="password-confirm" class="control-label">Website</label>
                    <input type="text" class="form-control" name="wb" value="{{$data->link}}">
                </div>
			</div>
		</div>
	</div>
</form>
@endsection