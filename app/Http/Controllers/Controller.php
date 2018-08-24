<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $setting = Setting::where('status', 1)
            ->where('language', app()->getLocale())
            ->first();

        $footerMenuLinks = MenuCategory::with('menus')->where('module', 'footerMenuLinks')->first();

        $footerMenuLabels = MenuCategory::with('menus')->where('module', 'footerMenuLabels')->first();

        view()->share(['setting' => $setting, 'footerMenuLabels' => $footerMenuLabels, 'footerMenuLinks' => $footerMenuLinks]);
    }
}
