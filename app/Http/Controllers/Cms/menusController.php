<?php

namespace App\Http\Controllers\Cms;

use App\Models\Menus;
use App\Models\SubMenus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class menusController extends Controller
{
    public function index()
    {
        $menus=Menus::all();
        View::share('menus', $menus);

        return view('CMS.menu.list');
    }

    public function create()
    {
        return view('CMS.menu.create');
    }

    public function create_post()
    {
        $menus=new Menus();
        $menus->title=Input::get('title');
        $menus->content=Input::get('content');
        $menus->order=Input::get('order');

        $menus->save();

        return redirect()->route('CMS.menus.create');
    }

    public function createSub()
    {
        $menus=Menus::all();
        View::share('menus', $menus);

        return view('CMS.menu.createsub');
    }

    public function createSub_post()
    {
        $submenus=new SubMenus();
        $submenus->menu_id=Input::get('menu_id');
        $submenus->title=Input::get('title');
        $submenus->content=Input::get('content');
        $submenus->order=Input::get('order');

        $submenus->save();

        return redirect()->route('CMS.menus.createsub');
    }

    public function remove($id)
    {
        Menus::find($id)->delete();
        SubMenus::where('menu_id', $id)->delete();

        return redirect()->route('CMS.menus.list');
    }

    public function remove_subs($id)
    {
        SubMenus::find($id)->delete();

        return redirect()->route('CMS.menus.list');
    }

    public function edit($id)
    {
        $menus=Menus::find($id);
        View::share('menus', $menus);

        return view('CMS.menu.edit');
    }

    public function edit_post($id)
    {
        $menus=Menus::find($id);
        $menus->title=Input::get('title');
        $menus->content=Input::get('content');
        $menus->order=Input::get('order');

        $menus->save();

        return redirect()->route('CMS.menus.list');
    }

    public function editSubs($id)
    {
        $menus=Menus::all();
        $subs=SubMenus::find($id);
        View::share('menus', $menus);
        View::share('subs', $subs);

        return view('CMS.menu.editsub');
    }

    public function editSubs_post($id)
    {
        $subs=SubMenus::find($id);
        $subs->menu_id=Input::get('menu_id');
        $subs->title=Input::get('title');
        $subs->content=Input::get('content');
        $subs->order=Input::get('order');

        $subs->save();

        return redirect()->route('CMS.menus.list');
    }


}
