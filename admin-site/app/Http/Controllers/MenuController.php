<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\MenuDetail;
use App\Http\Requests\MenuPostRequest;

class MenuController extends Controller
{
    private $menu;
    private $menuDetail;

    public function __construct(Menu $menu, MenuDetail $menuDetail) {
        $this->menu = $menu;
        $this->menuDetail = $menuDetail;
    }

    public function index(Request $request)
    {
        if (!empty($request->get('sort_target')) && !empty($request->get('sort_mode'))) {
            $menuArr = Menu::orderByRaw($request->get('sort_target') . ' IS NULL ASC')
                ->orderBy($request->get('sort_target'), $request->get('sort_mode'))
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $menuArr = Menu::orderBy('id', 'DESC')->get();
        }

        return view('menu.list')->with(['menuArr' => !empty($menuArr) ? $menuArr : []]);
    }

    public function create()
    {
        $menu = $this->menu;
        $menu->details[] = $this->menuDetail;
        return view('menu.input', compact('menu'));
    }

    public function createConfirm(MenuPostRequest $request)
    {
        return view('menu.confirm')->with(['inputs' => $request->all()]);
    }

    public function createPost(Request $request)
    {
        if (!empty($request->get('repair'))) {
            return redirect()
                ->route('menu.create')
                ->withInput();
        }

        if (!empty($request->get('add_box'))) {
            $data = $request->all();
            $menu = new Menu($data);
            foreach ($data['detail'] as $val) {
                $menu->details[] = new MenuDetail($val);
            }
            $menu->details[] = $this->menuDetail;
            return view('menu.input', compact('menu'));
        }

        if (!empty($request->get('delete_box'))) {
            $data = $request->all();
            $menu = new Menu($data);
            foreach ($data['detail'] as $key => $val) {
                if ($key === array_key_last($data['detail'])) {
                    break;
                }
                $menu->details[] = new MenuDetail($val);
            }
            return view('menu.input', compact('menu'));
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $menu = Menu::create($request->all() + ['create_user' => Auth::id()]);

            $menu->details()->createMany($request->get('detail'));

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return view('menu.result');
    }

    public function edit(Menu $menu)
    {
        return view('menu.input')->with(['menu' => $menu]);
    }

    public function editConfirm(MenuPostRequest $request, $id)
    {
        return view('menu.confirm')->with(['inputs' => $request->all(), 'id' => $id]);
    }

    public function editPost(Request $request, $id)
    {
        if (!empty($request->get('repair'))) {
            return redirect()
            ->route('menu.edit', $id)
                ->withInput();
        }

        $data = $request->all();
        $menu = new Menu($data);
        foreach ($data['detail'] as $val) {
            $menu->details[] = new MenuDetail($val);
        }

        if (!empty($request->get('add_box'))) {
            $menu->details[] = $this->menuDetail;
        } elseif (!empty($request->get('delete_box'))) {
            $menu->details->pop();
        }
        $menu->id = $id;    // idを設定すると子テーブルの情報を自動で取得してしまう為、最後に呼び出して取得させない
        return view('menu.input', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $menu = Menu::find($id);
            $menu->update($request->all() + ['create_user' => 1]);

            $menu->details()->delete();
            $menu->details()->createMany($request->get('detail'));

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return view('menu.result');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('menu.index');
    }
}
