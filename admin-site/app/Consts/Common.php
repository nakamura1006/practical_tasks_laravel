<?php
namespace App\Consts;

class Common
{
    const MODE_CREATE = 'create';
    const MODE_EDIT = 'edit';

    const MODE_CREATE_NAME = '登録';
    const MODE_EDIT_NAME = '編集';

    const MODE_LIST = [
        self::MODE_CREATE => self::MODE_CREATE_NAME,
        self::MODE_EDIT => self::MODE_EDIT_NAME,
    ];
}
