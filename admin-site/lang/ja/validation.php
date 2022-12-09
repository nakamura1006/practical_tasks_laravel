<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'required' => ':attributeを入力してください',
    'required_id_or_password' => 'IDかパスワードが入力されていません',
    'max' => [
        'string' => ':attributeは:max字以内で入力してください',
    ],
    'between' => [
        'string' => ':attributeは:min字以上:max字以内で入力してください',
    ],

    "attributes" => [
        "name" => "名前",
        "login_id" => "ID",
        "password" => "パスワード",
        "password_confirmation" => "パスワード(確認用)",
        "email" => "メールアドレス",
        "description" => "説明文",
        "remarks" => "備考",
        "turn" => "表示順",
    ],
];
