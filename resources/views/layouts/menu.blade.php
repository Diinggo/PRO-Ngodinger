<?php
$a = DB::table('appmenu')->where('menu','=','native')->orderBy('id','ASC')->get();
$c = DB::table('appmenu')->where('menu','=','framework')->orderBy('id','ASC')->get();  
?>
<header class="navbar yamm navbar-default navbar-fixed-top">
     <div class="container-fluid">
     <!-- Mobile Toggle -->
          <div class="navbar-header">
               <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar"
                    aria-controls="bs-navbar" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
               </button>
                    <a href="{{ url('') }}" class="navbar-brand" class="btn btn-kotak btn-border" data-toggle="tooltip" data-placement="bottom" 
                        title="Ngodinger"><img src="{{ url('image/icon4.png') }}" alt="Ngodinger">
                    </a>
                    <div class="hidden-lg hidden-md hidden-sm pull-right acari">
                         <a href="#search" class="btn btn-kotak btn-border" data-toggle="tooltip" 
                            data-placement="bottom" title="Cari ?"><i class="fa fa-search fa-lg"></i></a>
                    </div>
          </div>
     <!-- Menu Bar -->
          <nav id="bs-navbar" class="collapse navbar-collapse">
          <!-- Menu Dropdown -->
               <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs"><a href="{{ url('') }}" data-toggle="tooltip" data-placement="bottom" title="Home">
                        <i class="fa fa-home fa-lg"></i></a></li>
                    <li><a href="{{ url('blog') }}" data-toggle="tooltip" data-placement="bottom" title="Artikel">Artikel</a></li>
                    <li><a href="{{ url('tutor') }}" data-toggle="tooltip" data-placement="bottom" title="Tutorial">Tutorial</a></li>
                    <li><a href="{{ url('skill') }}" data-toggle="tooltip" data-placement="bottom" title="Skill">Skill</a></li>
                    <li class="dropdown yamm-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle" title="Native">Native  <i class="fa fa-caret-down"></i></a>
                         <ul class="dropdown-menu yamm-content">
                              <div class="row">@foreach($a as $a)
<?php $b = DB::table('applink')->where('menuid','=',$a->id)->where('status','=','publish')->orderBy('namalink','ASC')->get(); ?>
                                   <div class="col-md-2 col-sm-4">
                                        <h3>{{$a->submenu}}</h3>
                                        <ul class="list-unstyled mn-u">@foreach($b as $b)
                                            <li><a href="{{url('native/'.$b->sluglink)}}"  data-toggle="tooltip" data-placement="bottom" title="{{$b->namalink}}">{{$b->namalink}}</a></li>@endforeach
                                        </ul>
                                   </div>@endforeach
                              </div>
                         </ul>
                    </li>
                    <li class="dropdown yamm-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle" title="Framework">Framework  <i class="fa fa-caret-down"></i></a>
                         <ul class="dropdown-menu yamm-content">
                              <div class="row">@foreach($c as $c)
<?php $d = DB::table('applink')->where('menuid','=',$c->id)->where('status','=','publish')->orderBy('namalink','ASC')->get(); ?>
                                   <div class="col-md-2 col-sm-4">
                                        <h3>{{$c->submenu}}</h3>
                                        <ul class="list-unstyled mn-u">@foreach($d as $d)
                                            <li><a href="{{ url('framework/'.$d->sluglink) }}"  data-toggle="tooltip" data-placement="bottom"
                                                title="{{$d->namalink}}">{{$d->namalink}}</a></li>@endforeach
                                        </ul>
                                  </div> @endforeach
                             </div>
                         </ul>
                    </li>
                    <li>
                        <div class="navbar-form hidden-xs">
                            <a href="#search" class="btn btn-kotak btn-border"><i class="fa fa-search fa-lg"></i></a>
                        </div>
                    </li>
               </ul>
          </nav>
     </div>
</header>