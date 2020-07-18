@extends('layouts.admin')

@section('konten')
<?php $nom = 1; ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Semua Aplikasi</h1>
			<a href="{{ url('admin') }}" class="btn btn-danger">
				<i class="fa fa-arrow-left fa-lg"></i>  Kembali</a>

			<a href="{{ url('admin/app/new') }}" class="btn btn-success pull-right">
			<i class="fa fa-plus-circle fa-lg"></i>&nbsp; New Aplikasi</a>
		</div>
	<!--  -->
		<div class="col-md-12">
		<hr>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>NAMA</th>
							<th>Aplikasi</th>
							<th>Kategori</th>
							<th>Option</th>
							<th>Status</th>
							<th>Hapus</th>
						</tr>
					</thead>
					<tbody>@foreach($data as $tblisi)
						<tr>
							<td>{{$nom++}}</td>
							<td><a href="{{ url('admin/app/'.$tblisi->id ) }}">
								{{ $tblisi->namalink }}</a>
							</td>
							<td>{{$tblisi->menu}}</td>
							<td>{{$tblisi->submenu}}</td>
							<td>
								<ul class="nolis">
									<li><a href="{{ url('admin/app/'.$tblisi->id ) }}" class="btn label label-success lbl" title="Konten">
										<i class="fa fa-tasks fa-lg"></i></a></li><li>|</li>

									<li><a href="{{ url('admin/app/edit/'.$tblisi->id) }}" class="btn label label-info lbl" title="Edit">
										<i class="fa fa-edit fa-lg"></i></a></li><li>|</li>

									<form method="post" action="{{ url('admin/app/edit/'.$tblisi->id) }}">
									<li>
										{{ csrf_field() }}
	    								@if($tblisi->status == 'draft')
	    									<button class="btn label label-primary lbl btn-pub" type="submit" name="published" value="publish"
	    										title="Publish"><i class="fa fa-cloud fa-lg"></i></button>
	    								@else
	    									<button class="btn label label-warning lbl btn-dft" type="submit" name="saved" value="draft"
	    										title="Draft"><i class="fa fa-inbox fa-lg"></i></button>
	    								@endif
	    								
									</li></form>
								</ul>
							</td>
							<td>
								@if($tblisi->status == 'draft')
									<div class="label label-warning lbl">Draft</div>
								@elseif($tblisi->status == 'publish')
									<div class="label label-primary lbl">Publish</div>
								@endif
							</td>
							<td>
								<form method="post" action="{{ url('admin/app',$tblisi->id) }}">
								{{ csrf_field() }}
									<button type="submit" class="btn label label-danger btn-del"><i class="fa fa-trash fa-lg"></i></button>
								</form>
							</td>
						</tr>@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection