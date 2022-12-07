@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-confirm">
        <p class="subject">メニュー管理確認</p>
        <table>
            @if (!empty($id))
                <tr>
                    <th>ID</th>
                    <td colspan="3">{{ $id }}</td>
                </tr>
            @endif
            <tr>
                <th>メニュー名</th>
                <td colspan="3">{{ $inputs['name'] }}</td>
            </tr>
            <tr>
                <th>説明文</th>
                <td colspan="3" class="td-description">{!! nl2br($inputs['description']) !!}</td>
            </tr>
            <tr>
                <th>備考</th>
                <td colspan="3" class="td-remarks">{!! nl2br($inputs['remarks']) !!}</td>
            </tr>
            <tr>
                <th>表示順</th>
                <td colspan="3" class="td-turn">{{ $inputs['turn'] }}</td>
            </tr>
            <tr>
                <th rowspan="{{ count($inputs['detail']) }}">メニュー詳細</th>
                @foreach ($inputs['detail'] as $val)
                        <td class="detail-turn">表示順：{{ $val['turn'] }}</td>
                        <td class="detail-name">名前：{{ $val['name'] }}</td>
                        <td class="detail-price">料金：{{ $val['price'] }}</td>
                    </tr>
                    @if ($val != end($inputs['detail']))
                        <tr>
                    @endif
                @endforeach
        </table>
        @if (!empty($id))
            <form action="{{ route('menu.update', $id) }}" method="post" novalidate>
        @else
            <form action="{{ route('menu.store') }}" method="post" novalidate>
        @endif
            @csrf
            <input type="hidden" name="name" value="{{ $inputs['name'] }}">
            <input type="hidden" name="description" value="{{ $inputs['description'] }}">
            <input type="hidden" name="remarks" value="{{ $inputs['remarks'] }}">
            <input type="hidden" name="turn" value="{{ $inputs['turn'] }}">
            @foreach ($inputs['detail'] as $key => $val)
                <input type="hidden" name="detail[{{ $key }}][turn]" value="{{ $val['turn'] }}">
                <input type="hidden" name="detail[{{ $key }}][name]" value="{{ $val['name'] }}">
                <input type="hidden" name="detail[{{ $key }}][price]" value="{{ $val['price'] }}">
            @endforeach
            <div class="form-submit">
                @if (!empty($id))
                    <p><input type="submit" class="submit-repair" name="repair" value="修正" formaction="{{ route('menu.edit', $id) }}"></p>
                @else
                    <p><input type="submit" class="submit-repair" name="repair" value="修正" formaction="{{ route('menu.create') }}"></p>
                @endif
                <p><input type="submit" value="完了"></p>
            </div>
        </form>
    </div>
</div>

@endsection
