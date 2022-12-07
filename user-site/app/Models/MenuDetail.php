<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuDetail extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $touches = ['menus'];

    protected $fillable = [
        'menu_id',
        'name',
        'price',
        'turn',
    ];

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
