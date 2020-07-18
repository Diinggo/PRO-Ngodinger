@extends('layouts.admin')

@section('konten')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Data <label class="label label-info">Setting Web</label></h1>
				</div>
			</div>
		<!--  -->
			<div class="col-md-12">
				<a href="{{url('admin')}}" class="btn btn-danger">
					<i class="fa fa-arrow-left fa-lg"></i>  Kembali</a>

				<a href="{{ action('settingcontrol@create') }}" class="btn btn-success pull-right">
					<i class="fa fa-plus-circle fa-lg"></i>  New Setting</a>
			</div>
		<!--  -->
			<div class="col-md-12">
			<hr>
				<div class="table-responsive">
					<table id="tables" class="table table-hover table-striped table-bordered">
						<thead>
            				<tr>
                				<th>No</th>
                				<th>Slug</th>
                				<th>Judul</th>
                				<th>Edit</th>
                				<th>Hapus</th>
            				</tr>
        				</thead>
			        	<tbody>
			        	<?php $no=1 ?>
			        	@foreach ($data as $data)
			        		<tr>
			        			<td>{{ $no++ }}</td>
			        			<td>
			        				<a href="#" value="{{ action('settingcontrol@show', $data->id) }}"
			        					class="dekor modalMd" title="Show Data" data-toggle="modal" 
			        					data-target="#modalMd" style="display:block">
			        					{{ $data->slug }}</a>
			        			</td>
			        			<td>{{ $data->judul }}</td>
			        			<td>
			        			<a href="{{ url('admin/setting/'.$data->id.'/edit') }}" class="btn btn-primary btn-xs btn-edt">
			        				<i class="fa fa-edit"></i>  Edit</a>
			        			</td>
			        			<td>
			        			@if($data->status == 'baku')
			        			<label class="label label-warning">No Hapus</label>
			        			@else
			        			<form class="form-del" method="post" action="{{ action('settingcontrol@destroy',$data->id) }}">
			        				{{ csrf_field() }}
			        				{{ method_field('DELETE') }}
			        					<button class="btn btn-danger btn-xs btn-del" type="submit">
				        					<i class="fa fa-trash"></i>  Hapus</a>
				        				</button>
				        		</form>
				        		@endif
			        			</td>
			        		</tr>
			        	@endforeach
        				</tbody>
					</table>
				</div>
			</div>
		<!--  -->
		</div>
	</div>

<!--  -->
<div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="modalMdTitle"></h4>
      		</div>
      		<div class="modal-body">
        		<div class="modalError"></div>
        		<div id="modalMdContent">
        		
        		</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
  </div>
</div>

@endsection

@section('kaki')
	<script type="text/javascript">
		
	</script>
@endsection