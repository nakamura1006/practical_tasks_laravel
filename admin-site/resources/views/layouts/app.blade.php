<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @guest
        <title>{{ __('Admin Login') . __('Title Delimiter') . __('Ark Suginami') }}</title>
    @else
        <title>{{ __('Admin Screen') . __('Title Delimiter') . __('Ark Suginami') }}</title>
    @endguest
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/assets/css/admin.css')}}">
</head>
<body>
    <div class="container">
        @auth
            <header>
                <div class="top-subject">
                    <p>{{ __('Greeting', ['name' => Auth::user()->name]) }}</p>
                    <p>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-in"></i> {{ __('Do Logout') }}
                        </a>
                    </p>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                <h1 class="top-title">{{ __('Ark Suginami') }}</h1>
                <nav class="gl-nav">
                    <ul>
                        <li>
                            <a href="/">{{ __('Top') }}</a>
                        </li>
                        <li>
                            <a href="/">{{ __('Problem') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('menu.index') }}">{{ __('Menu') }}</a>
                        </li>
                        <li>
                            <a href="">○○管理</a>
                        </li>
                        <li>
                            <a href="">○○管理</a>
                        </li>
                        <li>
                            <a href="">○○管理</a>
                        </li>
                    </ul>
                </nav>
            </header>
        @endauth
        <main>
            @yield('content')
        </main>
        <footer>
            <p class="copyright">{{ __('Copyright') }}</p>
        </footer>
    </div>
</body>
</html>
