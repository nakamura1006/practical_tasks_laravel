<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'remarks',
        'turn',
        'create_user',
    ];

    public function details()
    {
        return $this->hasMany('App\Models\MenuDetail')
            ->orderByRaw('turn' . ' IS NULL ASC')
            ->orderBy('turn', 'ASC')
            ->orderBy('id', 'ASC');
    }
}
