<?php

// Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;
use Illuminate\Support\Str;

class Helper
{
    const SUPERADMIN_ROLE = 'super_admin';

    const ADMIN_ROLE = 'admin';

    const TEACHER_ROLE = 'teacher';

    const STUDENT_ROLE = 'student';

    const SUBSCRIBER_ROLE = 'subscriber';

    public static function applClasses()
    {

        // Demo
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-'.$i);
                if ($contains === true) {
                    $data = config('custom.'.'demo-'.$i);
                }
            }
        } else {
            $data = config('custom.sitepreferance');
        }
        // default data array
        $DefaultData = [
            'mainLayoutType' => 'vertical',
            'theme' => 'light',
            'sidebarCollapsed' => false,
            'navbarColor' => '',
            'horizontalMenuType' => 'floating',
            'verticalMenuNavbarType' => 'floating',
            'footerType' => 'static', //footer
            'layoutWidth' => 'boxed',
            'showMenu' => true,
            'bodyClass' => '',
            'pageClass' => '',
            'pageHeader' => true,
            'contentLayout' => 'default',
            'blankPage' => false,
            'defaultLanguage' => 'en',
            'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        $data = array_merge($DefaultData, $data);

        // All options available in the template
        $allOptions = [
            'mainLayoutType' => ['vertical', 'horizontal'],
            'theme' => ['light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'],
            'sidebarCollapsed' => [true, false],
            'showMenu' => [true, false],
            'layoutWidth' => ['full', 'boxed'],
            'navbarColor' => ['bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'],
            'horizontalMenuType' => ['floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'],
            'horizontalMenuClass' => ['static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'],
            'verticalMenuNavbarType' => ['floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'],
            'navbarClass' => ['floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'],
            'footerType' => ['static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'],
            'pageHeader' => [true, false],
            'contentLayout' => ['default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'],
            'blankPage' => [false, true],
            'sidebarPositionClass' => ['content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'],
            'contentsidebarClass' => ['content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'],
            'defaultLanguage' => ['en' => 'en', 'fr' => 'fr', 'de' => 'de', 'pt' => 'pt'],
            'direction' => ['ltr', 'rtl'],
        ];

        //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (! array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }

        //layout classes
        $layoutClasses = [
            'theme' => $data['theme'],
            'layoutTheme' => $allOptions['theme'][$data['theme']],
            'sidebarCollapsed' => $data['sidebarCollapsed'],
            'showMenu' => $data['showMenu'],
            'layoutWidth' => $data['layoutWidth'],
            'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
            'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
            'navbarColor' => $data['navbarColor'],
            'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
            'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
            'footerType' => $allOptions['footerType'][$data['footerType']],
            'sidebarClass' => '',
            'bodyClass' => $data['bodyClass'],
            'pageClass' => $data['pageClass'],
            'pageHeader' => $data['pageHeader'],
            'blankPage' => $data['blankPage'],
            'blankPageClass' => '',
            'contentLayout' => $data['contentLayout'],
            'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
            'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
            'mainLayoutType' => $data['mainLayoutType'],
            'defaultLanguage' => $allOptions['defaultLanguage'][$data['defaultLanguage']],
            'direction' => $data['direction'],
        ];
        // set default language if session hasn't locale value the set default language
        if (! session()->has('locale')) {
            app()->setLocale($layoutClasses['defaultLanguage']);
        }

        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true') {
            $layoutClasses['sidebarClass'] = 'menu-collapsed';
        }

        // blank page class
        if ($layoutClasses['blankPage'] == 'true') {
            $layoutClasses['blankPageClass'] = 'blank-page';
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-'.$i);
                if ($contains === true) {
                    $demo = 'demo-'.$i;
                }
            }
        }
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.'.$demo.'.'.$config, $val);
                }
            }
        }
    }

    public static function changeMainMenu($pageConfigs)
    {
        // dd($pageConfigs['courseMenu']);

        $verticalMenuData = (object) config('app_menu.student');
        $horizontalMenuData = (object) config('app_menu.student');
        // dd($verticalMenuData->menu);
        foreach ($pageConfigs['courseMenu'] as $module) {
            $submenu = [];
            foreach ($module->sections as $section) {
                $submenu[] = [
                    'url' => '/open-section'.'/'.$section->id,
                    'name' => $section->title,
                    'icon' => 'circle',
                    'slug' => $section->id,
                ];
            }

            $verticalMenuData->menu[] = [
                'url' => '/my-courses'.'/'.$module->id,
                'name' => $module->title,
                'icon' => 'activity',
                'slug' => $module->id,
                'submenu' => $submenu,
            ];
            $horizontalMenuData->menu[] = [
                'url' => '/my-courses'.'/'.$module->id,
                'name' => $module->title,
                'icon' => 'activity',
                'slug' => $module->id,
                'submenu' => $submenu,
            ];
        }

        dd($verticalMenuData, $horizontalMenuData);
        // Share all menuData to all the views
        \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);

    }

    public static function array_sum(array $array)
    {
        return array_sum($array);
    }

    public static function array_count(array $array)
    {
        return count($array);
    }

    public static function array_max(array $array)
    {
        return max($array);
    }

    public static function array_min(array $array)
    {
        return min($array);
    }

    public static function array_avg(array $array)
    {
        $total = count($array);
        $arraySum = self::array_sum($array);

        return number_format($arraySum / $total, 2).'%';

    }

    public static function scorePercentage($score, $total)
    {
        if ($score == 0 && $total == 0) {
            return '0.00 %';
        }

        return number_format((($score / $total) * 100), 2).' %';
    }

    public static function roundScorePercentage($score, $total)
    {
        if ($score == 0 && $total == 0) {
            return 0;
        }

        return round(($score / $total) * 100);
    }

    public static function userMedal($score, $total)
    {
        if ($score == 0 && $total == 0) {
            return 'N/A';
        }

        $percentage = number_format((($score / $total) * 100), 2);

        if ($percentage < 70) {
            return '<span class="bronze-medal">Bronze Medal!</span>';

        } elseif ($percentage < 85) {

            return "<span class='silver-medal'>Silver Medal!</span>";

        } else {
            return "<span class='gold-medal'>Gold Medal!</span>";
        }
    }

    public static function userMedalForPdf($score, $total)
    {
        if ($score == 0 && $total == 0) {
            return 'N/A';
        }

        $percentage = number_format((($score / $total) * 100), 2);

        if ($percentage < 70) {
            return 'Bronze Medal';

        } elseif ($percentage < 85) {

            return 'Silver Medal';

        } else {
            return 'Gold Medal';
        }
    }
}
