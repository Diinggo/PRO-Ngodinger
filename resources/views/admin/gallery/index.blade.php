@extends('layouts.admin')

@section('konten')
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<iframe src="{{ url('plugin/filemanager/dialog.php') }}?lang=en_EN&akey=e82bee55b911bdcf1649ba2c27c737fb" style="border:none;margin-top:15px;max-height:584px;" width="100%"
				height="590px"></iframe>
			</div>
		</div>
	</div>

@endsection