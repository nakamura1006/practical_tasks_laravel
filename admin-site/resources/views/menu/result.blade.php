@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-result">
        <p class="subject">メニュー管理完了</p>
        @if (!empty($errMsg))
            <p class="center-align"><{{ $errMsg }}</p>
        @else
            <p class="center-align msg-complete">完了しました</p>
        @endif
    </div>
</div>

@endsection
