@extends('layouts.app')

@section('content')

<div id="menu">
    <div class="main-input">
        <p class="subject">メニュー管理</p>
        @if (!empty($errMsg))
            <p class="center-align">{{ $errMsg }}</p>
        @else
            @if ($errors->any())
                <div class="box-error">
                    <ul>
                        @foreach ($errors->all() as $val)
                            <li>{{ $val }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (!empty($menu->id))
                <form action="{{ route('menu.edit.confirm', $menu->id) }}" method="post" novalidate>
            @else
                <form action="{{ route('menu.create.confirm') }}" method="post" novalidate>
            @endif
                @csrf
                <table>
                    @if (!empty($menu->id))
                        <tr>
                            <th>ID</th>
                            <td colspan="3">{{ $menu->id }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>メニュー名<span>（必須）</span></th>
                        <td colspan="3"><input type="text" name="name" value="{{ @old('name', $menu->name) }}"></td>
                    </tr>
                    <tr>
                        <th>説明文</th>
                        <td colspan="3"><textarea name="description" rows="6">{{ @old('description', $menu->description) }}</textarea></td>
                    </tr>
                    <tr>
                        <th>備考</th>
                        <td colspan="3"><textarea name="remarks" rows="6">{{ @old('remarks', $menu->remarks) }}</textarea></td>
                    </tr>
                    <tr>
                        <th>表示順</th>
                        <td colspan="3"><input type="number" name="turn" value="{{ @old('turn', $menu->turn) }}"></td>
                    </tr>
                    <tr>
                        <th rowspan="{{ count(@old('detail', $menu->details)) + 1 }}">メニュー詳細<span>（必須）</span></th>
                        @for ($i = 0; $i < count(@old('detail', $menu->details)); $i++)
                                <td class="detail-turn">表示順：<input type="number" name="detail[{{ $i }}][turn]" value="{{ @old("detail.$i.turn", $menu->details[$i]->turn) }}"></td>
                                <td class="detail-name">名前：<input type="text" name="detail[{{ $i }}][name]" value="{{ @old("detail.$i.name", $menu->details[$i]->name) }}"></td>
                                <td class="detail-price">料金：<input type="text" name="detail[{{ $i }}][price]" value="{{ @old("detail.$i.price", $menu->details[$i]->price) }}"></td>
                            </tr>
                            <tr>
                        @endfor
                        <td colspan="3">
                            @if (count(@old('detail', $menu->details)) < 5)
                                <input type="submit" name="add_box" value="BOX追加" formaction="">
                            @endif
                            @if (count(@old('detail', $menu->details)) > 1)
                                <input type="submit" name="delete_box" value="BOX削除" formaction="">
                            @endif
                        </td>
                    </tr>
                </table>
                <p class="center-align"><input type="submit" value="確認画面へ"></p>
            </form>
        @endif
    </div>
</div>

@endsection
