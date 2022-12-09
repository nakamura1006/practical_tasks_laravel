<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use App\Consts\Common;
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
        try {
            if (!empty($request->get('sort_target')) && !empty($request->get('sort_mode'))) {
                $menuArr = Menu::orderByRaw($request->get('sort_target') . ' IS NULL ASC')
                    ->orderBy($request->get('sort_target'), $request->get('sort_mode'))
                    ->orderBy(Menu::COL_ID, 'DESC')
                    ->get();
            } else {
                $menuArr = Menu::orderBy(Menu::COL_ID, 'DESC')->get();
            }

            if ($menuArr->isEmpty()) {
                $menuArr = [];
            }
        } catch (QueryException $e) {
            $errMsg = __('DB Error');
        }

        return view('menu.list')->with([
            'menuArr' => $menuArr ?? [],
            'errMsg' => $errMsg ?? '',
        ]);
    }

    public function create()
    {
        $menu = $this->menu;
        $menu->details[] = $this->menuDetail;
        return view('menu.input', compact('menu'))->with(['mode' => Common::MODE_CREATE]);
    }

    public function createConfirm(MenuPostRequest $request)
    {
        return view('menu.confirm')->with([
            'mode' => Common::MODE_CREATE,
            'inputs' => $request->all()
        ]);
    }

    public function createPost(Request $request)
    {
        if (!empty($request->get('repair'))) {
            return redirect()
                ->route('menu.create')
                ->withInput();
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $menu = Menu::create($request->all() + [Menu::COL_CREATE_USER => Auth::id()]);
            $menu->details()->createMany($request->get('detail'));

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $errMsg = __('DB Error');
        }

        return view('menu.result')->with([
            'mode' => Common::MODE_CREATE,
            'errMsg' => $errMsg ?? '']);
    }

    public function edit($id)
    {
        try {
            $menu = Menu::with(Menu::TABLE_CHILD)->find($id);
            if ($menu == null) {
                return redirect()->route('menu.index');
            }

            if ($menu->details->isEmpty()) {
                $errMsg = __('DB Error');
            }
        } catch (QueryException $e) {
            $errMsg = __('DB Error');
        }

        return view('menu.input')->with([
            'mode' => Common::MODE_EDIT,
            'menu' => $menu ?? '',
            'errMsg' => $errMsg ?? '',
        ]);
    }

    public function editConfirm(MenuPostRequest $request, $id)
    {
        return view('menu.confirm')->with([
            'mode' => Common::MODE_EDIT,
            'id' => $id,
            'inputs' => $request->all()
        ]);
    }

    public function editPost(Request $request, $id)
    {
        if (!empty($request->get('repair'))) {
            return redirect()
                ->route('menu.edit', ['id' => $id])
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $menu = Menu::find($id);
            $menu->update($request->all() + [Menu::COL_CREATE_USER => Auth::id()]);

            $menu->details()->delete();
            $menu->details()->createMany($request->get('detail'));

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            $errMsg = __('DB Error');
        }

        return view('menu.result')->with([
            'mode' => Common::MODE_EDIT,
            'errMsg' => $errMsg ?? ''
        ]);
    }

    public function destroy($id)
    {
        try {
            if (($menu = Menu::find($id)) != null) {
                $menu->delete();
            }
        } catch (QueryException $e) {
            return view('menu.list')->with([
                'menuArr' => [],
                'errMsg' => __('DB Error'),
            ]);
        }

        return redirect()->route('menu.index');
    }
}
