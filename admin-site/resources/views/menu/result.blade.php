@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-result">
        <p class="subject">{{ __('Menu Manage') . App\Consts\Common::MODE_LIST[$mode] . __('Complete') }}</p>
        @if (!empty($errMsg))
            <p class="center-align">{{ $errMsg }}</p>
        @else
            <p class="center-align msg-complete">{{ App\Consts\Common::MODE_LIST[$mode] . __('Complete Msg') }}</p>
        @endif
    </div>
</div>

@endsection
