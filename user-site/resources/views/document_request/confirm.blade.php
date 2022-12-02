@extends('layouts.app')

@section('title', __('Document Request'))

@section('content')

<div class="container">
    <section class="section01 sec-confirm">
        <h2>{{ __('Document Request') }}{{ __('Subject Send Confirm') }}<br><span>{{ __('Subject Document Request Eng') }}{{ __('Subject Send Confirm Eng') }}</span></h2>
        <table>
            <tr>
                <th>{{ __('Document Kind') }}</th>
                <td>{{ config('const.DOCUMENT_KIND')[$inputs['document_kind']] }}</td>
            </tr>
            <tr>
                <th>{{ __('Name') }}</th>
                <td>{{ $inputs['name'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Kana') }}</th>
                <td>{{ $inputs['kana'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Post Code') }}</th>
                <td>{{ $inputs['post_code'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Pref') }}</th>
                <td>{{ config('const.PREF')[$inputs['pref']] }}</td>
            </tr>
            <tr>
                <th>{{ __('City') }}</th>
                <td>{{ $inputs['city'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Apartment') }}</th>
                <td>{{ $inputs['address'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Tel') }}</th>
                <td>{{ $inputs['apartment'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Address') }}</th>
                <td>{{ $inputs['tel'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Email Address') }}</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Opinion') }}</th>
                <td>{!! nl2br($inputs['opinion']) !!}</td>
            </tr>
        </table>
        <form action="{{ route('document_request.result') }}" method="post" novalidate>
            @csrf
            <input type="hidden" name="document_kind" value="{{ $inputs['document_kind'] }}">
            <input type="hidden" name="name" value="{{ $inputs['name'] }}">
            <input type="hidden" name="kana" value="{{ $inputs['kana'] }}">
            <input type="hidden" name="post_code" value="{{ $inputs['post_code'] }}">
            <input type="hidden" name="pref" value="{{ $inputs['pref'] }}">
            <input type="hidden" name="city" value="{{ $inputs['city'] }}">
            <input type="hidden" name="address" value="{{ $inputs['address'] }}">
            <input type="hidden" name="apartment" value="{{ $inputs['apartment'] }}">
            <input type="hidden" name="tel" value="{{ $inputs['tel'] }}">
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
            <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
            <div class="form-submit submit-between">
                <p><input type="submit" class="submit-secondary" value="{{ __('Repair') }}" formaction="{{ route('document_request.repair') }}"></p>
                <p><input type="submit" class="submit-primary" value="{{ __('Send') }}"></p>
            </div>
        </form>
    </section>
</div>

@endsection
