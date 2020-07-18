@extends('layouts.admin')

@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Viewer Blogs</h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Artikel</th>
								<th>Jumlah Viewer</th>
								<th>Rincian</th>
							</tr>
						</thead>
						<tbody>
						<?php $a = 1; ?>
						@foreach($data as $data)
							<tr>
								<td>{{ $a++ }}</td>
								<td>{{ $data->judul }}</td>
								<?php 
								$jum = DB::table('bloglog')
								->select(DB::raw('COUNT(*) as jumlah, bloglog.ip'))
								->where('blogid','=',$data->id)->first();
								?>
								<td>{{ $jum->jumlah }}</td>
								<td><a href="{{ url('admin/viewer',$data->id) }}" class="label label-danger">Detail</a></td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>
@endsection