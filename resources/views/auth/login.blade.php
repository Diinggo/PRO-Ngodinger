@extends('layouts.aplikasi')

@section('judul') Login Aplikasi @endsection

@section('konten')
<div class="container" style="margin-top:21px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading text-center">
                    <h2><b>LOGIN</b></h2>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('coder/login') }}" autocomplete="false">
                        {{ csrf_field() }}
                    <!-- Has Email -->
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    <!-- Has Password -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    <!-- Has Submit -->
                        <div class="form-group">                        
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <!-- <a href="{{ url('/password/reset') }}">Lupa Password ?</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
