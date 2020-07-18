@extends('layouts.admin')

@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Detail Viewer</h1>
				</div>
				<div class="alert alert-success">
					{{ $data->judul }}
				</div>
			</div>
		<!--  -->
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Ip</th>
								<th>Kunjungan Pada</th>
							</tr>
						</thead>
						<tbody>
							<?php 
						$rep = DB::table('bloglog')->where('blogid','=',$data->id)->orderBy('created_at','DESC')->get();
						$a = 1;
						?>
						@foreach($rep as $sum)
						<?php 
						$dates = strtotime($sum->created_at);
						?>
							<tr>
								<td>{{ $a++ }}</td>
								<td>{{ $sum->ip }}</td>
								<td>{{ date('l, d M Y. h:i:s A',$dates) }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection