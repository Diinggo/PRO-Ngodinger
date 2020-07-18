<!-- New Side Barr -->
	<div class="container-fluid" id="nav-side">
          <div class="collapse navbar-collapse bs-example-navbar-collapse-1" >
               <ul class="nav navbar-nav side-nav sidebar-nav">
                    <li>
                         <a href="{{ action('aplikasicontrol@index') }}"><i class="fa fa-cubes fa-fw"></i>&nbsp;  Aplikasi</a>
                    </li>
                    <li>
                         <a href="{{ action('blogcontrol@index')}}"><i class="fa fa-sitemap fa-fw"></i>&nbsp;  Artikel</a>
                    </li>
                    <li>
                         <a href="{{ action('tutorcontrol@index') }}"><i class="fa fa-history fa-fw"></i>&nbsp;  Tutorial</a>
                    </li>
                    <li>
                         <a href="{{ action('skillcontrol@index') }}"><i class="fa fa-fire fa-fw"></i>&nbsp;  Skill</a>
                    </li>
                    <li>
                         <a href="{{ action('usercontrol@index') }}"><i class="fa fa-users fa-fw"></i>&nbsp;  User</a>
                    </li>
                    <li>
                         <a href="{{ action('settingcontrol@index')}}"><i class="fa fa-gears fa-fw"></i>&nbsp;  Setting</a>
                    </li>
               </ul>
          </div>
     </div>
</nav>