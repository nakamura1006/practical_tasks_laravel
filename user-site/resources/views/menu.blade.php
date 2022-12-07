@extends('layouts.app')

@section('title', __('Menu'))

@section('content')

<div class="container">
    <section class="section01">
        <h2>メニュー<br><span>MENU</span></h2>
        <div class="foreword">
            <p>{!! $foreword !!}</p>
        </div>
        @if (!empty($menuArr))
            <div class="text">
                @foreach ($menuArr as $key => $menu)
                    <div class="menu{{ sprintf('%02d', $key + 1); }}">
                        <h3>{{ $menu['name'] }}</h3>
                        <p class="menu-detail-description">{!! nl2br($menu['description']) !!}</p>
                        <table>
                            @foreach ($menu['details'] as $menuDetail)
                                <tr><th>{{ $menuDetail['name'] }}</th><td>{{ $menuDetail['price'] }}</td></tr>
                            @endforeach
                        </table>
                        @if (!empty($menu['remarks']))
                            <p class="menu-detail-remarks">{!! nl2br($menu['remarks']) !!}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>

@endsection
