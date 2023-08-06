<?php

return [
    'super_admin' => [
        'menu' => [
            [
                'url' => '/dashboard',
                'name' => 'Dashboard',
                'icon' => 'activity',
                'slug' => 'dashboard',
                'textClass' => 'fw-bolder text-white',
            ],

        ],
    ],
    'admin' => [
        'menu' => [
            [
                'url' => '/dashboard',
                'name' => 'Dashboard',
                'icon' => 'activity',
                'slug' => 'dashboard',
                'textClass' => 'fw-bolder text-white',
                // "submenu": [
                //     [
                //     "url": "/change-email",
                //     "name": "Update Email",
                //     "icon": "circle",
                //     "slug": "change-email"
                //     ],
                //     [
                //     "url": "/change-password",
                //     "name": "Password",
                //     "icon": "circle",
                //     "slug": "change-password"
                //     ]
                // ]
            ],
            [
                'url' => '/account',
                'name' => 'Account',
                'icon' => 'user',
                'slug' => 'account.index',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/manage/users',
                'name' => 'Users',
                'icon' => 'users',
                'slug' => 'manage-users',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/module',
                'name' => 'Modules',
                'icon' => 'book',
                'textClass' => 'fw-bolder text-white',
                'slug' => 'module.index',

            ],
        ],
    ],
    'teacher' => [
        'menu' => [
            [
                'url' => '/teacher-home',
                'name' => 'Home',
                'icon' => 'fi fi-br-home',
                'slug' => 'teacher-home',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/account',
                'name' => 'Account',
                'icon' => 'fi fi-br-portrait',
                'slug' => 'account.index',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/manage-scorecards',
                'name' => 'Manage Scorecard',
                'icon' => 'fi-br-mobile',
                'slug' => 'teacher.manage_score_card',
                'textClass' => 'fw-bolder text-white',
            ],
        ],
    ],
    'student' => [
        'menu' => [
            [
                'url' => '/',
                'name' => 'Dashboard',
                'icon' => 'fi  fi-br-grid',
                'slug' => 'dashboard',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/account',
                'name' => 'Account',
                'icon' => 'fi fi-br-portrait',
                'slug' => 'account.index',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/my-courses',
                'name' => 'My Courses',
                'icon' => 'fi fi-br-e-learning',
                'slug' => 'my-courses',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/my-certificate',
                'name' => 'My Certificates',
                'icon' => 'fi  fi-br-diploma',
                'slug' => 'my-certificate',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                // "url" => '/make-donation',
                'url' => '/',
                'name' => 'Donation',
                'icon' => 'fi  fi-br-hand-holding-heart',
                'slug' => 'make-donation',
                'textClass' => 'fw-bolder text-white',
            ],
        ],
    ],
    'user' => [
        'menu' => [
            [
                'url' => '/',
                'name' => 'Dashboard',
                'icon' => 'activity',
                'slug' => 'home',
                'textClass' => 'fw-bolder text-white',
            ],
            [
                'url' => '/account',
                'name' => 'Account',
                'icon' => 'user',
                'slug' => 'account.index',
            ],
        ],
    ],
];
