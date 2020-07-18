@extends('layouts.admin')

@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-header">Data <label class="label label-info">Tutorial</label></h1>
			</div>
		<!--  -->
			<div class="col-md-12">
				<a href="{{ url('admin') }}" class="btn btn-danger">
					<i class="fa fa-arrow-left fa-lg"></i>  Kembali</a>
				<a href="{{ action('tutorkategoricontrol@index') }}" class="btn btn-info pull-right">
					<i class="fa fa-server fa-lg"></i>  Kategori</a>
				<a href="{{ action('tutorcontrol@create') }}" class="btn btn-success pull-right">
					<i class="fa fa-plus-circle fa-lg"></i>  New Tutorial</a>
			</div>
		<!--  -->
			<div class="col-md-12">
				<hr>
				<div class="table-responsive">
					<table id="tables" class="table table-hover table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Judul</th>
								<th>Views</th>
								<th>Penulis</th>
								<th>Kategori</th>
								<th>Tanggal</th>
								<th>Action</th>
								<th>Status</th>
								<th>Del</th>
							</tr>
						</thead>
						<tbody>
					<?php $a = 1 ?>
					@foreach($data as $data)
							<tr>
								<td>{{ $a++ }}</td>
								<td>{{ $data->judul }}</td>
								<td>{{ $data->jumlah }}</td>
								<td>{{ $data->name }}</td>
								<td>{{ $data->nama }}</td>
								<td>
								<?php $t = strtotime($data->created_at) ?>Di Tambah Pada : <br>{{ date('d M y. h:i A',$t) }}<br>
								<?php $t = strtotime($data->updated_at) ?>Di Update Pada : <br>{{ date('d M y. h:i A',$t) }}
								</td>
								<td>
								<ul class="nolis">
									<li><a href="{{ url('admin/tutor/'. $data->id .'/edit') }}" class="btn label label-info lbl" title="Sunting">
										<i class="fa fa-edit fa-lg"></i></a></li>
									<li>|</li>

									<li><a href="{{ action('tutorcontrol@show', $data->id) }}" class="btn label label-success lbl" title="Lihat" target="blank"><i class="fa fa-eye fa-lg"></i></a></li>
									<li>|</li>

									<form class="form-upt" method="post"
										action="{{ action('tutorcontrol@update',$data->id) }}">
										<li>
										{{ csrf_field() }}
			        					{{ method_field('PUT') }}
			        					@if($data->status == 'draft')
			        						<button class="btn label label-primary lbl btn-pub" type="submit" name="published" value="publish" title="Publish"><i class="fa fa-cloud fa-lg"></i></button>
			        					@else
			        						<button class="btn label label-warning lbl btn-dft" type="submit" name="saved" value="draft" title="Draft">
			        						<i class="fa fa-inbox fa-lg"></i></button>
			        					@endif
			        					</li>
									</form>
									
								</ul>
								</td>
								<td>@if($data->status == 'draft')
									<span class="label label-warning">Draft</span>
								@elseif($data->status == 'publish')
									<span class="label label-primary">Publish</span>
								@elseif($data->status == 'review')
									<span class="label label-danger">Review</span>
								@endif</td>
								<td>
									<form class="form-del" method="post" 
										action="{{ action('tutorcontrol@destroy',$data->id) }}">
			        					{{ csrf_field() }}
			        					{{ method_field('DELETE') }}
			        					<button class="btn label label-danger lbl btn-del" type="submit" title="Hapus">
			        						<i class="fa fa-times fa-lg"></i></button>
									</form>
								</td>
							</tr>
					@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
