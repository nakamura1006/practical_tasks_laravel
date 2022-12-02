@extends('layouts.app')

@section('content')

<div class="content">
    <section class="section01">
        <div class="container">
            <h2>ご案内<br><span>GUIDE</span></h2>
            <div class="top-side">
                <p>ホームページをご覧いただき、ありがとうございます。<br>カウンセリングサロンArk杉並では、臨床心理士による<br>心理カウンセリングを提供しております。<br>当サロンの詳細は以下のリンクからご覧いただけます。</p>
                <p><img src="{{asset('/assets/images/clipboard.png')}}" alt="クリップボードの写真"></p>
            </div>
            <div class="bottom-side">
                <ul>
                    <li class="nav-about">
                        <a href="{{ route('about') }}">
                            <p><img src="{{asset('/assets/images/icon_about.png')}}" alt="家の画像"></p>
                            <p>当サロンについて</p>
                        </a>
                    </li>
                    <li class="nav-menu">
                        <a href="{{ route('menu') }}">
                            <p><img src="{{asset('/assets/images/icon_menu.png')}}" alt="クリップボードの画像"></p>
                            <p>メニュー</p>
                        </a>
                    </li>
                    <li class="nav-counselor">
                        <a href="{{ route('counselor') }}">
                            <p><img src="{{asset('/assets/images/icon_counselor.png')}}" alt="カウンセリングの画像"></p>
                            <p>カウンセラー紹介</p>
                        </a>
                    </li>
                    <li class="nav-access">
                        <a href="{{ route('access') }}">
                            <p><img src="{{asset('/assets/images/icon_access.png')}}" alt="地図の画像"></p>
                            <p>アクセス</p>
                        </a>
                    </li>
                    <li class="nav-blog">
                        <a href="http://arkcounseling.hatenablog.com" target="_blank">
                            <p><img src="{{asset('/assets/images/icon_blog.png')}}" alt="タグの画像"></p>
                            <p>ブログ</p>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('link') }}">
                        <p><img src="{{asset('/assets/images/icon_link.png')}}" alt="鎖の画像"></p>
                        <p>関連リンク</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section02">
        <div class="container">
            <h2>お知らせ <span>NEWS</span></h2>
            <p><a href="http://arkcounseling.hatenablog.com" target="_blank">一覧を見る </a></p>
            <dl>
                <a href="http://arkcounseling.hatenablog.com/entry/2019/07/08/221732" target="_blank">
                    <dt>2019.07.08</dt>
                    <dd>ブログ『モンスターハンターの話』を更新しました。</dd>
                </a>
                <a href="http://arkcounseling.hatenablog.com/entry/2019/07/01/233000" target="_blank">
                    <dt>2019.07.01</dt>
                    <dd>ブログ『無理をしない話』を更新しました。</dd>
                </a>
                <a href="http://arkcounseling.hatenablog.com/entry/2019/06/23/224650" target="_blank">
                    <dt>2019.06.23</dt>
                    <dd>ブログ『めしにしましょうの話』を更新しました。</dd>
                </a>
                <a href="http://arkcounseling.hatenablog.com/entry/2019/06/11/222858" target="_blank">
                    <dt>2019.06.11</dt>
                    <dd>ブログ『書くことないのでエンタメの話』を更新しました。</dd>
                </a>
                <a href="http://arkcounseling.hatenablog.com/entry/2019/04/07/120746" target="_blank">
                    <dt>2019.06.01</dt>
                    <dd>ブログ『6月ですね！な話』を更新しました。</dd>
                </a>
            </dl>
        </div>
    </section>
</div>
<section class="section03">
    <div class="container">
        <h2>推薦人　<span>鍋田 恭孝</span> (なべた やすたか) 先生</h2>
        <p class="profile">青山渋谷メディカルクリニック名誉院長、日本精神神経学会認定専門医及び指導医、元・立教大学現代心理学部教授<br>
        医学博士、臨床心理士、欧州共同認定サイコセラピスト、日本青年期精神療法学会常任理事(2011年まで理事長)、日本心身医学会代議員、日本うつ病学会評議員<br>
        <span>ホームページ：<a href="http://dr-nabeta.com/index.html" target="_blank">http://dr-nabeta.com/index.html</a></span></p>
        <p class="introduction">鍋田先生は、うつ病、心身症、身体醜形障害、社会不安障害、不登校、引きこもりなどといった現代的なテーマが社会に広く認知される以前から、これらの治療に携わっておられました。当サロンのスタッフたちは、鍋田先生が立ち上げたデイケアのスタッフとして、思春期・青年期のテーマを抱えた方々へ、side-by-side理論に基づいた支援を学んできました。</p>
        <p><img src="{{asset('/assets/images/dr.nabeta.png')}}" alt="鍋田先生の写真"></p>
    </div>
</section>

@endsection
