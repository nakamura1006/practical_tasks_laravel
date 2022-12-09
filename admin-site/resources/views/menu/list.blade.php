@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-list">
        <p class="subject">{{ __('Menu Manage') . __('List') }}</p>
        @if (!empty($errMsg))
            <p class="center-align">{{ $errMsg }}</p>
        @else
            <table>
                <tr>
                    <th>
                        <a class="sort-button" href="?sort_target=id&sort_mode=ASC">▲</a>
                        {{ __('Id') }}
                        <a class="sort-button" href="?sort_target=id&sort_mode=DESC">▼</a>
                    </th>
                    <th>
                        <a class="sort-button" href="?sort_target=name&sort_mode=ASC">▲</a>
                        {{ __('Menu Name') }}
                        <a class="sort-button" href="?sort_target=name&sort_mode=DESC">▼</a>
                    </th>
                    <th>{{ __('Created_at') }}</th>
                    <th>
                        <a class="sort-button" href="?sort_target=updated_at&sort_mode=ASC">▲</a>
                        {{ __('Updated_at') }}
                        <a class="sort-button" href="?sort_target=updated_at&sort_mode=DESC">▼</a>
                    </th>
                    <th><a class="list-button" href="{{ route('menu.create') }}">{{ __('New Registration') }}</a></th>
                </tr>
                @foreach ($menuArr as $val)
                    <tr>
                        <td>{{ $val['id'] }}</td>
                        <td>{{ $val['name'] }}</td>
                        <td>{{ $val['created_at'] }}</td>
                        <td>{{ $val['updated_at'] }}</td>
                        <td>
                            <a class="list-button" href="{{ route('menu.edit', ['id' => $val['id']]) }}">{{ __('Edit') }}</a>
                            <form action="{{ route('menu.destroy', ['id' => $val['id']]) }}" method="post" novalidate>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="list-submit" value="{{ __('Delete') }}" onClick="return confirm('本当に削除しますか？');">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if (empty($menuArr))
                <p class="center-align">{{ __('Menu Unregistered Msg') }}</p>
            @endif
        @endif
    </div>
</div>

@endsection
