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
                <table id="menu-table">
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
                        <th id="detail-th" rowspan="{{ count(@old('detail', $menu->details)) + 1 }}">メニュー詳細<span>（必須）</span></th>
                        @for ($i = 0; $i < count(@old('detail', $menu->details)); $i++)
                                <td class="detail-turn">表示順：<input type="number" name="detail[{{ $i }}][turn]" value="{{ @old("detail.$i.turn", $menu->details[$i]->turn) }}"></td>
                                <td class="detail-name">名前：<input type="text" name="detail[{{ $i }}][name]" value="{{ @old("detail.$i.name", $menu->details[$i]->name) }}"></td>
                                <td class="detail-price">料金：<input type="text" name="detail[{{ $i }}][price]" value="{{ @old("detail.$i.price", $menu->details[$i]->price) }}"></td>
                            </tr>
                            <tr>
                        @endfor
                        <td id="button-td" colspan="3">
                            @if (count(@old('detail', $menu->details)) < 5)
                                <input type="button" id="add-button" value="BOX追加" onClick="addBox();">
                            @endif
                            @if (count(@old('detail', $menu->details)) > 1)
                                <input type="button" id="delete-button" value="BOX削除" onClick="deleteBox();">
                            @endif
                            <script>
                                var table = document.getElementById("menu-table");
                                var th = document.getElementById("detail-th");
                                var counter = th.rowSpan - 1;
                                function addBox() {
                                    th.setAttribute("rowSpan", th.rowSpan + 1)

                                    var row = table.insertRow(table.rows.length - 1);
                                    var cell1 = row.insertCell(0);
                                    var cell2 = row.insertCell(1);
                                    var cell3 = row.insertCell(2);

                                    cell1.setAttribute("class", "detail-turn");
                                    cell2.setAttribute("class", "detail-name");
                                    cell3.setAttribute("class", "detail-price");

                                    cell1.innerHTML = '表示順：<input type="number" name="detail[' + counter + '][turn]" value="{{ @old("detail.' + counter + '.turn", $menu->details[' + counter + ']->turn) }}">';
                                    cell2.innerHTML = '名前：<input type="text" name="detail[' + counter + '][name]" value="{{ @old("detail.' + counter + '.name", $menu->details[' + counter + ']->name) }}">';
                                    cell3.innerHTML = '料金：<input type="text" name="detail[' + counter + '][price]" value="{{ @old("detail.' + counter + '.price", $menu->details[' + counter + ']->price) }}">';

                                    counter++;

                                    createDeleteButton(counter);
                                }

                                function deleteBox() {
                                    table.deleteRow(table.rows.length - 2);
                                    th.setAttribute("rowSpan", th.rowSpan - 1)
                                    counter--;

                                    createDeleteButton(counter);
                                }

                                function createDeleteButton(count) {
                                    if (document.getElementById("delete-button") == null) {
                                        var input = document.createElement('input');
                                        input.setAttribute("type", "button");
                                        input.setAttribute("id", "delete-button");
                                        input.setAttribute("value", "BOX削除");
                                        input.setAttribute("onclick", "deleteBox()");
                                        var td = document.getElementById("button-td");
                                        td.appendChild(input);
                                    }

                                    if (document.getElementById("add-button") == null) {
                                        var input = document.createElement('input');
                                        input.setAttribute("type", "button");
                                        input.setAttribute("id", "add-button");
                                        input.setAttribute("value", "BOX追加");
                                        input.setAttribute("onclick", "addBox()");
                                        var td = document.getElementById("button-td");
                                        td.prepend(input);
                                    }

                                    if (count == 1) {
                                        var td = document.getElementById("button-td");
                                        var btn = document.getElementById("delete-button");
                                        td.removeChild(btn);
                                    } else if (count == 5) {
                                        var td = document.getElementById("button-td");
                                        var btn = document.getElementById("add-button");
                                        td.removeChild(btn);
                                    }
                                }
                            </script>
                        </td>
                    </tr>
                </table>
                <p class="center-align"><input type="submit" value="確認画面へ"></p>
            </form>
        @endif
    </div>
</div>

@endsection
