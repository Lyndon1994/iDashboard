@inject('menuPresenter','App\Presenters\Admin\MenuPresenter')
<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
          <div class="dropdown profile-element"> <span>
                  <a href="{{url('user')}}"><img alt="image" class="img-circle" src="{{empty(getUser()->headimgurl)?asset('admin/img/profile_small.jpg'):getUser()->headimgurl}}" style="max-width: 60px;"/></a>
                   </span>
              {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                  {{--<span class="clear"> <span class="block m-t-xs"> {{getUser()->name}} <strong class="font-bold"></strong>--}}
                   {{--</span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>--}}
              {{--<ul class="dropdown-menu animated fadeInRight m-t-xs">--}}
                  {{--<li><a href="/user/edit">Profile</a></li>--}}
                  {{--<li class="divider"></li>--}}
                  {{--<li><a href="login.html">Logout</a></li>--}}
              {{--</ul>--}}
          </div>
          <div class="logo-element">
              <a href="{{url('user')}}">{{getUser()->name}}</a>
          </div>
      </li>
      {!!$menuPresenter->sidebarMenuList($sidebarMenu)!!}
    </ul>
  </div>
</nav>