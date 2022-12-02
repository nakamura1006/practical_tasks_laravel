<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (Route::currentRouteName() == 'index')
        <title>{{ __('Counseling Salon Ark Suginami') }}</title>
    @else
        <title>@yield('title'){{ __('Title Delimiter') . __('Counseling Salon Ark Suginami') }}</title>
    @endif
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/assets/css/ress.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/ls.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/sp.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/document_request.css')}}">
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body id="{{isset($bodyId) ? $bodyId : ''}}">
    <div class="menu-trigger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav class="drawer-menu">
        <p><a href="{{ route('contact') }}"><img src="{{asset('/assets/images/button.jpg')}}" alt="{{ __('Contact on Web') }}"></a></p>
        <ul>
            <li class="nav-home"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
            <li class="nav-about"><a href="{{ route('about') }}">{{ __('About') }}</a></li>
            <li class="nav-menu"><a href="{{ route('menu') }}">{{ __('Menu') }}</a></li>
            <li class="nav-counselor"><a href="{{ route('counselor') }}">{{ __('Counselor') }}</a></li>
            <li class="nav-document-request"><a href="{{ route('document_request.input') }}">{{ __('Document Request') }}</a></li>
            <li class="nav-access"><a href="{{ route('access') }}">{{ __('Access') }}</a></li>
            <li class="nav-blog"><a href="http://arkcounseling.hatenablog.com" target="_blank">{{ __('Blog') }}</a></li>
            <li class="nav-link"><a href="{{ route('link') }}">{{ __('Link') }}</a></li>
        </ul>
    </nav>
    <div class="overlay"></div>
    <header>
        <div class="container">
            <div class="top">
                <div class="left-side">
                    <p><a href="{{ route('index') }}"><img src="{{asset('/assets/images/logo.png')}}" alt="{{ __('Counseling Salon Ark') }}"></a></p>
                </div>
                <div class="right-side">
                    <p><a href="https://twitter.com/ark_counseling" target="_blank"><img src="{{asset('/assets/images/twitter.png')}}" alt="{{ __('Twitter') }}"></a></p>
                    <p><a href="https://www.instagram.com/csarksuginami" target="_blank"><img src="{{asset('/assets/images/instagram.png')}}" alt="{{ __('Instagram') }}"></a></p>
                    <p><a href="{{ route('contact') }}"><img src="{{asset('/assets/images/button.jpg')}}" alt="{{ __('Contact on Web') }}"></a></p>
                </div>
            </div>
            <nav class="global-nav">
                <ul>
                    <li class="nav-home {{ Route::currentRouteName() == 'index' ? 'on' : 'off' }}"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                    <li class="nav-about {{ Route::currentRouteName() == 'about' ? 'on' : 'off' }}"><a href="{{ route('about') }}">{{ __('About') }}</a></li>
                    <li class="nav-menu {{ Route::currentRouteName() == 'menu' ? 'on' : 'off' }}"><a href="{{ route('menu') }}">{{ __('Menu') }}</a></li>
                    <li class="nav-counselor {{ Route::currentRouteName() == 'counselor' ? 'on' : 'off' }}"><a href="{{ route('counselor') }}">{{ __('Counselor') }}</a></li>
                    <li class="nav-document-request {{ strpos(Route::currentRouteName(), 'document_request') !== false ? 'on' : 'off' }}"><a href="{{ route('document_request.input') }}">{{ __('Document Request') }}</a></li>
                    <li class="nav-access {{ Route::currentRouteName() == 'access' ? 'on' : 'off' }}"><a href="{{ route('access') }}">{{ __('Access') }}</a></li>
                    <li class="nav-blog off"><a href="http://arkcounseling.hatenablog.com" target="_blank">{{ __('Blog') }}</a></li>
                    <li class="nav-link {{ Route::currentRouteName() == 'link' ? 'on' : 'off' }}"><a href="{{ route('link') }}">{{ __('Link') }}</a></li>
                </ul>
            </nav>
            @if (Route::currentRouteName() == 'index')
                <h1>{!! __('Home Subject1') !!}</h1>
                <p>{!! __('Home Subject2') !!}</p>
                <div class="scroll">
                    <p>{{ __('Scroll') }}</p>
                </div>
                <div class="bubble01"></div>
                <div class="bubble02"></div>
                <div class="bubble03"></div>
            @endif
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="footer-line"></div>
        <div class="container">
            <div class="left-side">
                <div class="top-side">
                    <p><a href="{{ route('index') }}"><img src="{{asset('/assets/images/logo.png')}}" alt="{{ __('Counseling Salon Ark') }}"></a></p>
                    <p><span>{{ __('Ark Post Code') }}</span><br>{{ __('Ark Address') }}</p>
                </div>
                <div class="bottom-side">
                    <p><a href="{{ route('contact') }}"><img src="{{asset('/assets/images/button.jpg')}}" alt="{{ __('Contact on Web') }}"></a></p>
                    <p>{{ __('Tel.') }} {{ __('Ark Tel') }}<br>{{ __('Email.') }} {{ __('Ark Email') }}</p>
                </div>
                <table>
                    <tr>
                        <th>{{ __('Business Hours') }}</th><th>{{ __('Week1') }}</th><th>{{ __('Week2') }}</th><th>{{ __('Week3') }}</th><th>{{ __('Week4') }}</th><th>{{ __('Week5') }}</th><th>{{ __('Week6') }}</th><th>{{ __('Week7') }}</th>
                    </tr>
                    <tr>
                        <td>{{ __('Business Hours1') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('◯') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Business Hours2') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td><td>{{ __('◯') }}</td><td>{{ __('ー') }}</td><td>{{ __('◯') }}</td><td>{{ __('ー') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Business Hours3') }}</td><td>{{ __('◯') }}</td><td>{{ __('◯') }}</td><td>{{ __('◯') }}</td><td>{{ __('ー') }}</td><td>{{ __('◯') }}</td><td>{{ __('ー') }}</td><td>{{ __('ー') }}</td>
                    </tr>
                </table>
                <ul>
                    <li>{!! __('Footer Msg1') !!}</li>
                    <li>{!! __('Footer Msg2') !!}</li>
                    <li>{!! __('Footer Msg3') !!}</li>
                </ul>
            </div>
            <div class="right-side">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.461136142382!2d139.62707231525982!3d35.71487598018653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018eded39d67c4d%3A0x241262a7d96168e8!2z44Kr44Km44Oz44K744Oq44Oz44Kw44K144Ot44OzQXJr5p2J5Lim!5e0!3m2!1sja!2sjp!4v1564720390375!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>
                <p class="comment"><a href="{{ route('access') }}">{{ __('Access') }}<br>{{ __('Detail') }}</a></p>
            </div>
        </div>
        <p class="copyright">{!! __('Copyright') !!}</p>
    </footer>
</body>
</html>
