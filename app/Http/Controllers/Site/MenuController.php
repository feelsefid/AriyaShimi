<?php

namespace App\Http\Controllers\Site;

use App\Models\Menu;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::where('status', 1)
            ->where('language', app()->getLocale())
            ->where('menu_categories_id', 1)
            ->orderBy('sort_order')
            ->get()
            ->toArray();

        return buildTree($menu);
    }
}
