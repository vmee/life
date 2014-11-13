<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="{{ Request::is('home') ? 'active' : null }}"><a href="{{ URL::route('home') }}"><i class="icon-book"></i>首页</a></li>

        @forelse (Baby::where('user_id','=', Sentry::getUser()->getId())->get() as $baby)
        <li><a href="{{ URL::route('home') }}">{{ $baby->name }}</a></li>
        @empty
        <li><a>你还没添加宝宝,点击加号添加</a></li>
        @endforelse

        <li><a href="{{ URL::route('baby.add') }}"><span class="glyphicon glyphicon-plus"></span></a></li>

    </ul>

    <ul class="nav navbar-nav navbar-right">
        @if (!Sentry::check())
        <li class="{{ Request::is('user/login') ? 'active' : null }}"><a href="{{ URL::route('login') }}"><i class="icon-"></i> 登陆</a></li>
        <li class="{{ Request::is('user/register') ? 'active' : null }}"><a href="{{ URL::route('register') }}"><i class="icon-book"></i> 注册</a></li>
        @else
        <li><a href="{{ URL::route('profile') }}">{{Sentry::getUser()->email}}</a></li>
        @if (Sentry::getUser()->hasAccess('administrator'))
        <li><a href="{{ URL::route('admin_dashboard') }}"><i class="icon-lock"></i>管理后台</a></li>
        @endif
        <li><a href="{{ URL::route('logout') }}"><i class="icon-lock"></i> Logout</a></li>
        @endif
    </ul>

</div><!--/.nav-collapse -->
