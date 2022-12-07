@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-list">
        <p class="subject">メニュー管理リスト</p>
        @if (!empty($errMsg))
            <p class="center-align">{{ $errMsg }}</p>
        @else
            <table>
                <tr>
                    <th>
                        <a class="sort-button" href="?sort_target=id&sort_mode=ASC">▲</a>
                        ID
                        <a class="sort-button" href="?sort_target=id&sort_mode=DESC">▼</a>
                    </th>
                    <th>
                        <a class="sort-button" href="?sort_target=name&sort_mode=ASC">▲</a>
                        メニュー名
                        <a class="sort-button" href="?sort_target=name&sort_mode=DESC">▼</a>
                    </th>
                    <th>登録日時</th>
                    <th>
                        <a class="sort-button" href="?sort_target=updated_at&sort_mode=ASC">▲</a>
                        更新日時
                        <a class="sort-button" href="?sort_target=updated_at&sort_mode=DESC">▼</a>
                    </th>
                    <th><a class="list-button" href="{{ route('menu.create') }}">新規登録</a></th>
                </tr>
                @foreach ($menuArr as $val)
                    <tr>
                        <td>{{ $val['id'] }}</td>
                        <td>{{ $val['name'] }}</td>
                        <td>{{ $val['created_at'] }}</td>
                        <td>{{ $val['updated_at'] }}</td>
                        <td>
                            <a class="list-button" href="{{ route('menu.edit', $val['id']) }}">編集</a>
                            <form action="{{ route('menu.destroy', $val['id']) }}" method="post" novalidate>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="list-submit" name="delete" value="削除" onClick="return confirm('本当に削除しますか？');">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if (empty($menuArr))
                <p class="center-align">メニューが登録されていません</p>
            @endif
        @endif
    </div>
</div>

@endsection
