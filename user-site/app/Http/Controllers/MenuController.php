<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use App\Models\Menu;

class MenuController extends Controller
{
    const FOREWORD_DEFAULT = '料金のお支払いは、カウンセリング開始時に現金のみでの受け取りとなっております。<br>後払いやまとめてのお支払いには対応しておりませんのでご了承ください。';

    public function __construct() {
    }

    public function show()
    {
        try {
            $menuArr = Menu::with(Menu::TABLE_CHILD)
                ->orderByRaw(Menu::COL_TURN . ' IS NULL ASC')
                ->orderBy(Menu::COL_TURN, 'ASC')
                ->orderBy(Menu::COL_ID, 'ASC')
                ->get();

            if ($menuArr->isEmpty()) {
                $foreword = __('Page in Preparation');
                $menuArr = [];
            }
        } catch (QueryException $e) {
            $foreword = __('DB Error');
        }

        return view('menu')->with([
            'bodyId' => 'menu',
            'menuArr' => $menuArr ?? [],
            'foreword' => $foreword ?? self::FOREWORD_DEFAULT,
        ]);
    }
}
