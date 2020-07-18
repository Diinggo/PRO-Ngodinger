<nav class="navbar navbar-default navbar-fixed-top" id="nav-default">
     <!-- NEW Header Navbar -->
     <div class="navbar-header" id="nav-head">
          <!-- Left Button -->
          <button type="button" class="navbar-toggle collapsed pull-left navbar-toggle-left" data-toggle="collapse"
          data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
          </button>
          <!-- RightButton -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target=".bs-example-navbar-collapse-2" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
          </button>
          <!-- Icon -->
          <a class="navbar-brand" href="{{ url('admin') }}" style="padding-right:30px;">
          <i class="fa fa-dashboard fa-lg"></i>  |  Dashboard</a>
     </div>
     <!-- END Header Navbar -->
     <!-- NEW Main Menu -->
     <div class="container-fluid" id="nav-main">
          <div class="collapse navbar-collapse bs-example-navbar-collapse-2">
          <!--  -->
               <ul class="nav navbar-nav">
                    <li>
                    <form class="navbar-form" role="search">
                         <a href="{{url('')}}" target="blank" class="btn btn-info">Website</a>
                    </form>
                    </li>
                    <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kategori  <span class="caret"></span></a>
                         <ul class="dropdown-menu">
                              <li><a href="{{ action('skillkategoricontrol@index') }}">Skill</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="{{ action('tutorkategoricontrol@index') }}">Tutorial</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="{{ action('blogkategoricontrol@index') }}">Artikel</a></li>
                         </ul>
                    </li>
                    <li>
                         <a href="{{ url('admin/gallery') }}">Pustaka</a>
                    </li>
               </ul>
          <!--  -->
               <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                    role="button" aria-haspopup="true" aria-expanded="false">
                    Hai, {{ Auth::user()->name }}<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                              <li><a href="{{ url('admin/edit',Auth::user()->id) }}">Setting</a></li>
                              <li><a href="{{ url('admin/pass',Auth::user()->id) }}">Password</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="{{ url('/logout') }}">Log Out</a></li>
                         </ul>
                    </li>
               </ul>
          </div>
     </div>
     <!-- END Main Menu-->