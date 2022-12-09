<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Menu;

class MenuDetail extends Model
{
    use HasFactory;

    const COL_ID = 'id';
    const COL_MENU_ID = 'menu_id';
    const COL_NAME = 'name';
    const COL_PRICE = 'price';
    const COL_TURN = 'turn';
    const TABLE_PARENT = 'menus';

    public $timestamps = false;
    protected $touches = [self::TABLE_PARENT];

    protected $fillable = [
        self::COL_MENU_ID,
        self::COL_NAME,
        self::COL_PRICE,
        self::COL_TURN,
    ];

    public function menus()
    {
        return $this->belongsTo(Menu::class, self::COL_MENU_ID, Menu::COL_ID);
    }
}
