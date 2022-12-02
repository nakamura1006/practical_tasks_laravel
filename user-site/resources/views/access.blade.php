@extends('layouts.app')

@section('title', __('Access'))

@section('content')

<div class="container">
    <section class="section01">
        <h2>アクセス<br><span>ACCESS</span></h2>
        <div class="text">
            <div class="access-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.461136142382!2d139.62707231525982!3d35.71487598018653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018eded39d67c4d%3A0x241262a7d96168e8!2z44Kr44Km44Oz44K744Oq44Oz44Kw44K144Ot44OzQXJr5p2J5Lim!5e0!3m2!1sja!2sjp!4v1564720390375!5m2!1sja!2sjp" frameborder="0" style="border:0" allowfullscreen></iframe>
                <p>荻窪駅北口バス停3番乗り場より10分、本天沼二丁目バス停下車　徒歩5分<br>
                阿佐ヶ谷駅北口バス停阿50乗り場より5分、大鳥前バス停下車　徒歩1分<br>
                下井草駅南口バス停荻10乗り場より3分、下井草一丁目バス停下車　徒歩4分</p>
            </div>
            <div class="access-guide">
                <div class="ogikubo">
                    <h3>荻窪駅からのアクセス</h3>
                    <div class="ogikubo01">
                        <p>荻窪駅北口3番乗り場から乗車し、本天沼二丁目で下車します。</p>
                        <p><img src="{{asset('/assets/images/access_ogikubo01.jpg')}}" alt="荻窪駅からのアクセス01"></p>
                    </div>
                    <div class="ogikubo02">
                        <p>バスの進行方向へ真っ直ぐ行くと写真の景色が見えてくるので、家の前を左折します。</p>
                        <p><img src="{{asset('/assets/images/access_ogikubo02.jpg')}}" alt="荻窪駅からのアクセス02"></p>
                    </div>
                    <div class="ogikubo03">
                        <p>しばらく行くと写真の景色が右手に見えるので、ここを右折後直進します。</p>
                        <p><img src="{{asset('/assets/images/access_ogikubo03.jpg')}}" alt="荻窪駅からのアクセス03"></p>
                    </div>
                    <div class="ogikubo04">
                        <p>直進すると写真の景色が見えます。ここまで来たらあと少しです。</p>
                        <p><img src="{{asset('/assets/images/access_ogikubo04.jpg')}}" alt="荻窪駅からのアクセス04"></p>
                    </div>
                    <div class="ogikubo05">
                        <p>こちらの奥にある民家の2階が当サロンになります。</p>
                        <p><img src="{{asset('/assets/images/access_arrival.jpg')}}" alt="荻窪駅からのアクセス05"></p>
                    </div>
                </div>
                <div class="asagaya">
                    <h3>阿佐ヶ谷駅からのアクセス</h3>
                    <div class="asagaya01">
                        <p>阿佐ヶ谷駅北口3番乗り場から乗車し、大鳥前で下車します。</p>
                        <p><img src="{{asset('/assets/images/access_asagaya01.jpg')}}" alt="阿佐ヶ谷駅からのアクセス01"></p>
                    </div>
                    <div class="asagaya02">
                        <p>道路を渡り、バスの進行方向へ進んでさらに信号を渡ります。</p>
                        <p><img src="{{asset('/assets/images/access_asagaya02.jpg')}}" alt="阿佐ヶ谷駅からのアクセス02"></p>
                    </div>
                    <div class="asagaya03">
                        <p>そのまま進むと写真の景色が見えるので、ここを右折します。</p>
                        <p><img src="{{asset('/assets/images/access_asagaya03.jpg')}}" alt="阿佐ヶ谷駅からのアクセス03"></p>
                    </div>
                    <div class="asagaya04">
                        <p>真っ直ぐ進むと左手に当サロンが見えてきます。</p>
                        <p><img src="{{asset('/assets/images/access_arrival.jpg')}}" alt="阿佐ヶ谷駅からのアクセス04"></p>
                    </div>
                </div>
                <div class="shimoigusa">
                    <h3>下井草駅からのアクセス</h3>
                    <div class="shimoigusa01">
                        <p>下井草駅南口荻10乗り場から乗車し、下井草一丁目で下車後、写真の場所を左へ進みます。</p>
                        <p><img src="{{asset('/assets/images/access_shimoigusa01.jpg')}}" alt="下井草駅からのアクセス01"></p>
                    </div>
                    <div class="shimoigusa02">
                        <p>西友の前を右折します。</p>
                        <p><img src="{{asset('/assets/images/access_shimoigusa02.jpg')}}" alt="下井草駅からのアクセス02"></p>
                    </div>
                    <div class="shimoigusa03">
                        <p>道なりに進みます。</p>
                        <p><img src="{{asset('/assets/images/access_shimoigusa03.jpg')}}" alt="下井草駅からのアクセス03"></p>
                    </div>
                    <div class="shimoigusa04">
                        <p>写真の場所を向かいに渡った後左折します。</p>
                        <p><img src="{{asset('/assets/images/access_shimoigusa04.jpg')}}" alt="下井草駅からのアクセス04"></p>
                    </div>
                    <div class="shimoigusa05">
                        <p>写真のバス停の先にある道を右折します。</p>
                        <p><img src="{{asset('/assets/images/access_shimoigusa05.jpg')}}" alt="下井草駅からのアクセス05"></p>
                    </div>
                    <div class="shimoigusa06">
                        <p>しばらく直進すると左手に当サロンが見えてきます。</p>
                        <p><img src="{{asset('/assets/images/access_arrival.jpg')}}" alt="下井草駅からのアクセス06"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
