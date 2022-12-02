@extends('layouts.app')

@section('title', __('Document Request'))

@section('content')

<div class="container">
    <section class="section01 sec-result">
        @if (!empty($errMsg))
            <h2>{{ __('Document Request') }}{{ __('Subject Error') }}<br><span>{{ __('Subject Document Request Eng') }}{{ __('Subject Error Eng') }}</span></h2>
            <p><?=$errMsg?></p>
        @else
            <h2>{{ __('Document Request') }}{{ __('Subject Send Complete') }}<br><span>{{ __('Subject Document Request Eng') }}{{ __('Subject Send Complete Eng') }}</span></h2>
            <p>{{ __('Send Complete Msg1') }}</p>
            <p>
                {{ __('Send Complete Msg2') }}<br>
                {{ __('Send Complete Msg3') }}
            </p>
            <p>{{ __('Send Complete Msg4') }}</p>
        @endif
        <p><a href="{{ route('index') }}">{{ __('Back TopPage') }}</a></p>
    </section>
</div>

@endsection
