<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>当サロンについて | カウンセリングサロンArk杉並</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/assets/css/ress.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/ls.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/sp.css')}}">
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
        <p><a href="{{ route('contact') }}"><img src="{{asset('/assets/images/button.jpg')}}" alt="Webでご予約・お問い合わせ"></a></p>
        <ul>
            <li class="nav-home"><a href="{{ route('index') }}">ホーム</a></li>
            <li class="nav-about"><a href="{{ route('about') }}">当サロンについて</a></li>
            <li class="nav-menu"><a href="{{ route('menu') }}">メニュー</a></li>
            <li class="nav-counselor"><a href="{{ route('counselor') }}">カウンセラー紹介</a></li>
            <li class="nav-document-request"><a href="document_request/input.php">資料のご請求</a></li>
            <li class="nav-access"><a href="{{ route('access') }}">アクセス</a></li>
            <li class="nav-blog"><a href="http://arkcounseling.hatenablog.com" target="_blank">ブログ</a></li>
            <li class="nav-link"><a href="{{ route('link') }}">関連リンク</a></li>
        </ul>
    </nav>
    <div class="overlay"></div>
    <header>
        <div class="container">
            <div class="top">
                <div class="left-side">
                    <p><a href="{{ route('index') }}"><img src="{{asset('/assets/images/logo.png')}}" alt="カウンセリングサロンArk"></a></p>
                </div>
                <div class="right-side">
                    <p><a href="https://twitter.com/ark_counseling" target="_blank"><img src="{{asset('/assets/images/twitter.png')}}" alt="Twitter"></a></p>
                    <p><a href="https://www.instagram.com/csarksuginami" target="_blank"><img src="{{asset('/assets/images/instagram.png')}}" alt="Instagram"></a></p>
                    <p><a href="{{ route('contact') }}"><img src="{{asset('/assets/images/button.jpg')}}" alt="Webでご予約・お問い合わせ"></a></p>
                </div>
            </div>
            <nav class="global-nav">
                <ul>
                    <li class="nav-home {{ Route::currentRouteName() == 'index' ? 'on' : 'off' }}"><a href="{{ route('index') }}">ホーム</a></li>
                    <li class="nav-about {{ Route::currentRouteName() == 'about' ? 'on' : 'off' }}"><a href="{{ route('about') }}">当サロンについて</a></li>
                    <li class="nav-menu {{ Route::currentRouteName() == 'menu' ? 'on' : 'off' }}"><a href="{{ route('menu') }}">メニュー</a></li>
                    <li class="nav-counselor {{ Route::currentRouteName() == 'counselor' ? 'on' : 'off' }}"><a href="{{ route('counselor') }}">カウンセラー紹介</a></li>
                    <li class="nav-document-request off"><a href="document_request/input.php">資料のご請求</a></li>
                    <li class="nav-access {{ Route::currentRouteName() == 'access' ? 'on' : 'off' }}"><a href="{{ route('access') }}">アクセス</a></li>
                    <li class="nav-blog off"><a href="http://arkcounseling.hatenablog.com" target="_blank">ブログ</a></li>
                    <li class="nav-link {{ Route::currentRouteName() == 'link' ? 'on' : 'off' }}"><a href="{{ route('link') }}">関連リンク</a></li>
                </ul>
            </nav>
            @if (Route::currentRouteName() == 'index')
                <h1>ようこそ<br>カウンセリングサロン<br>Ark(アーク)杉並 へ</h1>
                <p>東京都杉並区にある心理カウンセラー(臨床心理士)たちによるカウンセリングルームです。<br>対人関係、学校、仕事、ご家族やご自身のことなど、多様なご相談を承っております。</p>
                <div class="scroll">
                    <p>Scroll</p>
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
                    <p><a href="{{ route('index') }}"><img src="{{asset('/assets/images/logo.png')}}" alt="カウンセリングサロンArk"></a></p>
                    <p><span>〒167-0031</span><br>東京都杉並区本天沼1-17-6 2F</p>
                </div>
                <div class="bottom-side">
                    <p><a href="{{ route('contact') }}"><img src="{{asset('/assets/images/button.jpg')}}" alt="Webでご予約・お問い合わせ"></a></p>
                    <p>Tel. 070-1183-0513<br>Mail. arksuginami@gmail.com</p>
                </div>
                <table>
                    <tr>
                        <th>営業時間</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th>日</th>
                    </tr>
                    <tr>
                        <td>10:00〜20:00</td><td>ー</td><td>ー</td><td>ー</td><td>ー</td><td>ー</td><td>ー</td><td>◯</td>
                    </tr>
                    <tr>
                        <td>10:00〜21:00</td><td>ー</td><td>ー</td><td>ー</td><td>◯</td><td>ー</td><td>◯</td><td>ー</td>
                    </tr>
                    <tr>
                        <td>19:00〜21:00</td><td>◯</td><td>◯</td><td>◯</td><td>ー</td><td>◯</td><td>ー</td><td>ー</td>
                    </tr>
                </table>
                <ul>
                    <li>自動車でお越しの際は事前にお申し付けください。</li>
                    <li>電話は面接中などで非常につながりにくくなっております。<br>メールもしくはWebからのお問い合わせをおすすめいたします。</li>
                    <li>最終受付時間は営業時間の1時間前となっております。</li>
                </ul>
            </div>
            <div class="right-side">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.461136142382!2d139.62707231525982!3d35.71487598018653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018eded39d67c4d%3A0x241262a7d96168e8!2z44Kr44Km44Oz44K744Oq44Oz44Kw44K144Ot44OzQXJr5p2J5Lim!5e0!3m2!1sja!2sjp!4v1564720390375!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>
                <p class="comment"><a href="{{ route('access') }}">アクセス<br>詳細</a></p>
            </div>
        </div>
        <p class="copyright">&copy; Counselling Salon Ark Suginami</p>
    </footer>
</body>
</html>
