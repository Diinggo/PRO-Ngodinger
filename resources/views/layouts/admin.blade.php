<!DOCTYPE html>
<html>
<head>
	<title>Ngodinger.com | Tutorial Web Terlengkap Di indonesia</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Designed By : Diinggo Sirojudin"> 
    <link rel="shortcut icon" type="icon" href="{{ url('favicon.png') }}">
    <!-- Css Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugin/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugin/monokai.css') }}">
    <!-- Jquery -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery/jquery.fancybox.min.css') }}" media='all' >
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery/dataTables.bootstrap.min.css') }}">
    <!-- Css Default -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.darkly.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugin/sb-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom.css') }}">
    <!--  -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugin/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/plugin/select2-bootstrap.css') }}">
</head>
<body>
<div id="wrapper">
	@include('layouts.admin-menu')
	@include('layouts.admin-sidebar')
	<div id="page-wrapper">
		@yield('konten')
	</div>
</div>
<!-- Java Script For Load Faster -->	
	<script src="{{ url('assets/js/jquery-2.2.3.min.js') }}"></script>
	<script src="{{ url('plugin/tinymce/tinymce.min.js') }}"></script>
    <!-- Plugin Script -->
	<script src="{{ url('assets/js/plugin/sweetalert.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/highlight.pack.js') }}"></script>
    <script src="{{ url('assets/js/plugin/select2.js') }}"></script>
    <!-- Jquery Plugins -->
    <script src="{{ url('assets/js/jquery/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery/jquery.fancybox.js') }}"></script>
    <script src="{{ url('assets/js/jquery/jquery.observe_field.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ url('assets/js/jquery/jquery.dataTables.js') }}"></script>
    <script src="{{ url('assets/js/jquery/dataTables.bootstrap.min.js') }}"></script>
    <!-- Default Script -->
	<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>	
	<script src="{{ url('assets/js/custom.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
  			$('pre code').each(function(i, block) {
    			hljs.highlightBlock(block);
  			});
		});
        $(document).ready(function() {
            $('table').dataTable();
        });
        var base_url = '{{url('/')}}';
	</script>

    @yield('kaki')

</body>
</html>