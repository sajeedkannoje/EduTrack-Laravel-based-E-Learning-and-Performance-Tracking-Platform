<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function () {
            if (auth()->check()) {
                if (auth()->user()->hasRole('super_admin')) {
                    $role = 'super_admin';
                } elseif (auth()->user()->hasRole('admin')) {
                    $role = 'admin';
                } elseif (auth()->user()->hasRole('teacher')) {
                    $role = 'teacher';
                } elseif (auth()->user()->hasRole('student')) {
                    $role = 'student';
                } else {
                    $pageConfigs['layout'] = 'subscriber';
                    $role = 'user';
                }

                $verticalMenuData = (object) config('app_menu.'.$role);
                $horizontalMenuData = (object) config('app_menu.'.$role);
                // Share all menuData to all the views

                \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);

            }

        });

        // get all data from menu.json file
        // $verticalMenuJson = file_get_contents(base_path('resources/data/menu-data/verticalMenu.json'));
        // $verticalMenuData = json_decode($verticalMenuJson);
        // $horizontalMenuJson = file_get_contents(base_path('resources/data/menu-data/horizontalMenu.json'));
        // $horizontalMenuData = json_decode($horizontalMenuJson);
        // \View::share('menuData',[$verticalMenuData, $horizontalMenuData]);
    }
}
