@extends('layouts.admin')

@section('konten')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Dashboard Admin <small>Statistics Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Selamat Datang {{Auth::user()->name}}. Hai, ADMIN {{Auth::user()->usernama}}. Apa Kabar ?
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-cubes fa-5x"></i>
                            </div>
                            <?php $app = DB::table('applink')->count('id'); ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$app}}</div>
                                <div>Aplikasi !</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{action('aplikasicontrol@index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Aplikasi</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-sitemap fa-5x"></i>
                            </div>
                            <?php $art = DB::table('blogpost')->count('id'); ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$art}}</div>
                                <div>Artikel</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{action('blogcontrol@index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Artikel</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-history fa-5x"></i>
                            </div>
                            <?php $tut = DB::table('tutorpost')->count('id') ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$tut}}</div>
                                <div>Tutorial</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{action('tutorcontrol@index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Tutorial</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-fire fa-5x"></i>
                            </div>
                            <?php $ski = DB::table('skillpost')->count('id'); ?>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$ski}}</div>
                                <div>Skill</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{action('skillcontrol@index')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Skill</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-plug fa-fw"></i> External Link Plugins</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                        	<div class="row">
                        		<div class="col-md-4 form-group">
                        			<a href="//addthis.com" class="btn btn-danger btn-block" target="_blank">Add This</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//ngodinger.disqus.com" class="btn btn-info btn-block" target="_blank">Disqus</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//sumome.com" class="btn btn-success btn-block" target="_blank">Sumo Me</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//analytics.google.com/analytics/web/" class="btn btn-danger btn-block" target="_blank">Google Analistic</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//tagmanager.google.com/?hl=en" class="btn btn-warning btn-block" target="_blank">Google Tag Manager</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//youtube.com" class="btn btn-danger btn-block" target="_blank">Youtube</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//facebook.com" class="btn btn-primary btn-block" target="_blank">Facebook</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//twitter.com/ngodingerdev" class="btn btn-info btn-block" target="_blank">Twitter</a>
                        		</div>
                        		<div class="col-md-4 form-group">
                        			<a href="//plus.google.com" class="btn btn-danger btn-block" target="_blank">Google Plus</a>
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
@endsection