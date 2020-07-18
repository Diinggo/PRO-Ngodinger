@extends('layouts.admin')

@section('konten')
<form role="form" method="POST" action="{{ action('usercontrol@store') }}">
{{ csrf_field() }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Tambah <label class="label label-warning">User</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-12">
				<a href="{{ url('admin/user') }}" class="btn btn-danger">
					<i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Kembali</a>
				<button type="submit" class="btn btn-primary pull-right">
                    	<i class="fa fa-btn fa-user"></i> Register
                </button>
				<hr>
			</div>
		<!--  -->
			<div class="col-md-4 col-md-push-8">
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>

                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>

               <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                	<label for="password-confirm" class="control-label">Confirm Password</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
			</div>
			<div class="col-md-8 col-md-pull-4">

	      		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                <label for="name" class="control-label">Username</label>
	                    <input id="name" type="text" class="form-control" name="name" 
	                    value="{{ old('name') }}" required="required">

	                    @if ($errors->has('name'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('name') }}</strong>
	                       </span>
	                    @endif
	            </div>

	            <div class="form-group{{ $errors->has('usernama') ? ' has-error' : '' }}">
	                <label for="name" class="control-label">Nama Lengkap</label>
	                    <input id="name" type="text" class="form-control" name="usernama" 
	                    	value="{{ old('usernama') }}">

	                    @if ($errors->has('usernama'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('usernama') }}</strong>
	                        </span>
	                    @endif
	            </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                        required="required">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group">
                	<label>Pilih Role</label>
                	<select name="role" class="form-control" required="required">
                		<option><-- Pilih Role --></option>
                		<option value="admin">admin</option>
                		<option value="tutor">tutor</option>
                		<option value="user">user</option>
                	</select>
                </div>
			</div>		
		</div>
	</div>
</form>
@endsection