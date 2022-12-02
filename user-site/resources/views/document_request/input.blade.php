@extends('layouts.app')

@section('title', __('Document Request'))

@section('content')

<div class="container">
    <section class="section01 sec-input">
        <h2>{{ __('Document Request') }}<br><span>{{ __('Subject Document Request Eng') }}</span></h2>
        <form action="{{ route('document_request.confirm') }}" method="post" novalidate>
            @csrf
            <table>
                <tr>
                    <th>{{ __('Document Kind') }}</th>
                    <td>
                        @foreach (config('const.DOCUMENT_KIND') as $key => $val)
                            <label><input type="radio" name="document_kind" value="{{ $key }}"{{ $key == old('document_kind', 1) ? ' checked' : '' }}>{{ $val }}</label>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('Name') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="name" value="{{ old('name') }}">
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('Kana') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('kana')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="kana" value="{{ old('kana') }}">
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('Post Code') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('post_code')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="post_code" value="{{ old('post_code') }}">
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('Pref') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('pref')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <select name="pref">
                            <option value="">{{ __('Please Select') }}</option>
                            @foreach (config('const.PREF') as $key => $val)
                                <option value="{{ $key }}"{{ $key == old('pref') ? ' selected' : '' }}>{{ $val }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('City') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('city')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="city" value="{{ old('city') }}">
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('Address') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('address')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="text" name="address" value="{{ old('address') }}">
                    </td>
                </tr>
                <tr>
                    <th>{{ __('Apartment') }}</th>
                    <td><input type="text" name="apartment" value="{{ old('apartment') }}"></td>
                </tr>
                <tr>
                    <th>{{ __('Tel') }}</th>
                    <td><input type="text" name="tel" value="{{ old('tel') }}"></td>
                </tr>
                <tr>
                    <th><label>{{ __('Email Address') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email" value="{{ old('email') }}">
                    </td>
                </tr>
                <tr>
                    <th><label>{{ __('Email Address Confirmation') }}</label><span>{{ __('Required') }}</span></th>
                    <td>
                        @error('email_confirmation')
                            <p class="error">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email_confirmation" value="{{ old('email_confirmation') }}">
                    </td>
                </tr>
                <tr>
                    <th>{{ __('Opinion') }}</th>
                    <td><textarea name="opinion" rows="4" cols="40">{{ old('opinion') }}</textarea></td>
                </tr>
            </table>
            <div class="form-submit">
                <p><input type="submit" class="submit-primary" value="{{ __('Confirm Input') }}"></p>
            </div>
        </form>
    </section>
</div>

@endsection
