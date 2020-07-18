@extends('layouts.admin')

@section('konten')
<form method="post" action="{{ action('aplikasicontrol@ppass',Auth::user()->id)}}">
{{csrf_field()}}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Edit Password<label class="label label-warning">User</label></h1>
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
		<div class="col-md-12">
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
	</div>
</div>
</form>
@endsection