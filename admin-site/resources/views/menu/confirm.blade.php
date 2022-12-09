@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-confirm">
        <p class="subject">{{ __('Menu Manage') . App\Consts\Common::MODE_LIST[$mode] . __('Confirm') }}</p>
        <table>
            @if (!empty($id))
                <tr>
                    <th>{{ __('Id') }}</th>
                    <td colspan="3">{{ $id }}</td>
                </tr>
            @endif
            <tr>
                <th>{{ __('Menu Name') }}</th>
                <td colspan="3">{{ $inputs['name'] }}</td>
            </tr>
            <tr>
                <th>{{ __('Description') }}</th>
                <td colspan="3" class="td-description">{!! nl2br($inputs['description']) !!}</td>
            </tr>
            <tr>
                <th>{{ __('Remarks') }}</th>
                <td colspan="3" class="td-remarks">{!! nl2br($inputs['remarks']) !!}</td>
            </tr>
            <tr>
                <th>{{ __('Turn') }}</th>
                <td colspan="3" class="td-turn">{{ $inputs['turn'] }}</td>
            </tr>
            <tr>
                <th rowspan="{{ count($inputs['detail']) }}">{{ __('Menu Detail') }}</th>
                @foreach ($inputs['detail'] as $val)
                        <td class="detail-turn">{{ __('Turn') }}：{{ $val['turn'] }}</td>
                        <td class="detail-name">{{ __('Name') }}：{{ $val['name'] }}</td>
                        <td class="detail-price">{{ __('Price') }}：{{ $val['price'] }}</td>
                    </tr>
                    @if ($val != end($inputs['detail']))
                        <tr>
                    @endif
                @endforeach
        </table>
        <form action="{{ $mode == 'edit' ? route('menu.update', ['id' => $id]) : route('menu.store') }}" method="post" novalidate>
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
                <p><input type="submit" class="submit-repair" name="repair" value="{{ __('Repair') }}" formaction="{{ $mode == 'edit' ? route('menu.edit', ['id' => $id]) : route('menu.create') }}"></p>
                <p><input type="submit" value="{{ App\Consts\Common::MODE_LIST[$mode] . __('Complete') }}"></p>
            </div>
        </form>
    </div>
</div>

@endsection
