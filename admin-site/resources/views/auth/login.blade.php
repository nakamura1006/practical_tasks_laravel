@extends('layouts.app')

@section('content')

<div id="login">
    <h1>{{ __('Ark Suginami') }}　{{ __('Screen Admin Login') }}</h1>
    <form action="{{ route('login') }}" method="post" novalidate>
        @csrf
        <p class="error">
            @foreach ($errors->all() as $val)
                @if (!empty($val))
                    {{ $val }}
                    @break
                @endif
            @endforeach
        </p>
        <table>
            <tr>
                <th>{{ __('Login Id') }}:　</th>
                <td><input type="text" name="login_id" value="{{ old('login_id') }}"></td>
            </tr>
            <tr>
                <th>{{ __('Password') }}:　</th>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <p><input type="submit" name="auth" value="{{ __('Authentication') }}"></p>
    </form>
</div>

@endsection
