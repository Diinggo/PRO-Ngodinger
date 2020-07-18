@extends('layouts.aplikasi')

@section('judul','Not Found !!!')

@section('konten')
<div class="container" style="background-color:#fff;height:400px;">
	<div class="row">
		<div class="col-md-8">
			<div style="margin-top:150px" class="form-group">
				<h1>Ooops, Halaman Tidak Ada . . . .</h1>
				<a href="{{url('')}}" class="btn btn-primary btn-kotak"><i class="fa fa-arrow-left"></i>&nbsp;Kembali Homepage</a>
			</div>
		</div>
	<!--  -->
		<div class="col-md-4">
			<center>
				<img src="{{url('assets/images/ngoding2.png')}}" class="img-responsive" style="margin-top:80px;">
			</center>
		</div>
	</div>
</div>
@endsection