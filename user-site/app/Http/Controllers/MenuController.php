<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use App\Models\Menu;

class MenuController extends Controller
{
    public function __construct() {
    }

    public function show()
    {
        try {
            $menuArr = Menu::with('details')
                ->orderByRaw('turn' . ' IS NULL ASC')
                ->orderBy('turn', 'ASC')
                ->orderBy('id', 'ASC')
                ->get();

            $foreword = '料金のお支払いは、カウンセリング開始時に現金のみでの受け取りとなっております。<br>後払いやまとめてのお支払いには対応しておりませんのでご了承ください。';
            if ($menuArr->isEmpty()) {
                $foreword = 'ページの準備中。';
                $menuArr = [];
            }
        } catch (QueryException $e) {
            $menuArr = [];
            $foreword = 'エラーが発生しました 〇〇に連絡してください。';
        }

        return view('menu')->with([
            'bodyId' => 'menu',
            'menuArr' => $menuArr,
            'foreword' => $foreword,
        ]);
    }
}
