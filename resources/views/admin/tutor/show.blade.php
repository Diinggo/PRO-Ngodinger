@extends('layouts.aplikasi')
@section('title'){{ $data->judul }}@endsection
@section('konten')
	<h1>
		{{ $data->konten }}
	</h1>
@endsection