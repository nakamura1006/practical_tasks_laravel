<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\MenuDetail;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    const COL_ID = 'id';
    const COL_NAME = 'name';
    const COL_DESCRIPTION = 'description';
    const COL_REMARKS = 'remarks';
    const COL_TURN = 'turn';
    const COL_CREATE_USER = 'create_user';
    const TABLE_CHILD = 'details';

    protected $fillable = [
        self::COL_NAME,
        self::COL_DESCRIPTION,
        self::COL_REMARKS,
        self::COL_TURN,
        self::COL_CREATE_USER,
    ];

    public function details()
    {
        return $this->hasMany('App\Models\MenuDetail')
            ->orderByRaw(MenuDetail::COL_TURN . ' IS NULL ASC')
            ->orderBy(MenuDetail::COL_TURN, 'ASC')
            ->orderBy(MenuDetail::COL_ID, 'ASC');
    }
}
