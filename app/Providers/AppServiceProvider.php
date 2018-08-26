<?php

namespace App\Providers;

use App\Models\MenuCategory;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::where('status', 1)
            ->where('language', app()->getLocale())
            ->first();

        $footerMenuLinks = MenuCategory::with('menus')->where('module', 'footerMenuLinks')->first();

        $footerMenuLabels = MenuCategory::with('menus')->where('module', 'footerMenuLabels')->first();

        view()->share([
            'setting' => $setting,
            'footerMenuLabels' => $footerMenuLabels,
            'footerMenuLinks' => $footerMenuLinks
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
