<?php

return [
    'login_uri'           => env('DASHBOARD_PREFIX', getenv('DASHBOARD_PREFIX')) . '/login',
    'logout_action'       => 'Distilleries\Expendable\Http\Controllers\Backend\LoginController@getLogout',
    'admin_base_uri'      => env('DASHBOARD_PREFIX', getenv('DASHBOARD_PREFIX')),
    'config_file_assets'  => base_path() . '/package.json',
    'folder_whitelist'    => [
        'moximanager'
    ],
    'listener'            => [
        '\Distilleries\Expendable\Listeners\UserListener'
    ],
    'mail'                => [
        'actions' => [
            'emails.password'
        ]
    ],
    'remember_me'         => false,
    'menu'                => \Distilleries\Expendable\Config\MenuConfig::menu([], 'beginning'),
    'menu_left_collapsed' => false,
    'state'               => [
        'Distilleries\DatatableBuilder\Contracts\DatatableStateContract' => [
            'color'    => 'bg-green-haze',
            'icon'     => 'th-list',
            'libelle'  => 'expendable::menu.datatable',
            'position' => 0,
            'action'   => 'getIndex'
        ],
        'Distilleries\Expendable\Contracts\ExportStateContract'          => [
            'color'    => 'bg-blue-hoki',
            'icon'     => 'save-file',
            'libelle'  => 'expendable::menu.export',
            'position' => 1,
            'action'   => 'getExport'
        ],
        'Distilleries\Expendable\Contracts\ImportStateContract'          => [
            'color'    => 'bg-red-sunglo',
            'icon'     => 'open-file',
            'libelle'  => 'expendable::menu.import',
            'position' => 2,
            'action'   => 'getImport'
        ],
        'Distilleries\FormBuilder\Contracts\FormStateContract'           => [
            'color'    => 'bg-yellow',
            'icon'     => 'pencil',
            'libelle'  => 'expendable::menu.add_state',
            'position' => 3,
            'action'   => 'getEdit'
        ],
    ],
    'auth'                => [
        'security_enabled' => true,
        'nb_of_try'        => 5
    ]
];