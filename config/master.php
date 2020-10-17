<?php
return [

    /*
    |--------------------------------------------------------------------------
    | GrandMaster
    |--------------------------------------------------------------------------
    |
    | Untuk Pengaturan standar GrandMaster
    |
    */
    'aplikasi' =>   [
                        'nama'          => 'Grand Master',
                        'singkatan'     => 'GM',
                        'logo'		    => env('APP_URL').'/img/logo.png',
                        'tema'          => NULL, // 1,2,3,4,5,6,7,8,9,10,11,12,13
                        'login_versi'   => 2, // 1,2
                    ],
    'aksesgrup' =>  [
                        'root'      =>  [
                                            'menu'      => ['pengaturanroot', 'pengaturan', 'extra'],
                                            'submenu'   => ['menu', 'user', 'aksesgrup', 'aksesmenu', 'submenu','perbaikan'],
                                        ],
                        'admin'     =>  [
                                            'menu'      => ['extra'],
                                            'submenu'   => [],
                                        ],
                        'user'      =>  [
                                            'menu'      => ['extra'],
                                            'submenu'   => [],
                                        ],
                    ],
    'level' => [
                    0 => 'Unknown',
                    1 => 'Root',
                    2 => 'Admin',
                    3 => 'User',
    ],
    'url'   =>  [
                    'admin'     => '',
                    'public'    => '',
                ],
    'ukuran' => [
                    'slide' =>  [
                                    'width'     => 1920,
                                    'height'    => 1000,
                                ],
                    'wide' =>  [
                                    'width'     => 1170,
                                    'height'    => 500,
                                ],
                    'thumb' =>  [
                                    'width'     => 700,
                                    'height'    => 500,
                                ],
                    'small' =>  [
                                    'width'     => 450,
                                    'height'    => 250,
                                ],
                    'xs'    =>  [
                                    'width'     => 90,
                                    'height'    => 90,
                                ],

    ],      
    //artisan password untuk validasi melakukan sintak di command laravel
    'artisan_password'   =>  env('PASSWORD_ARTISAN', FALSE),
];