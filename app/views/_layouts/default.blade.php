<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{Config::get('settings.site_name', 'site')}}</title>

    @include('_partials.assets')

</head>
<body>
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::route('home') }}">{{Config::get('settings.site_name', 'site')}}</a>
        </div>

        @include('_partials.navigation')


    </div>
</nav>


<div class="container">

    @yield('main')

</div>
</body>
</html>