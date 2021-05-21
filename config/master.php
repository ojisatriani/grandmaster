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
                                            'pengaturanroot'    => 
                                                                    [
                                                                        'parent' => NULL
                                                                    ],
                                            'pengaturan'        => 
                                                                    [
                                                                        'parent' => NULL
                                                                    ],
                                            'menu'              => 
                                                                    [
                                                                        'parent' => 'pengaturanroot'
                                                                    ],
                                            'user'              => 
                                                                    [
                                                                        'parent' => 'menu'
                                                                    ],
                                            'aksesgrup'         => 
                                                                    [
                                                                        'parent' => 'pengaturanroot'
                                                                    ],
                                            'aksesmenu'         => 
                                                                    [
                                                                        'parent' => 'aksesgrup'
                                                                    ],
                                            'submenu'         => 
                                                                    [
                                                                        'parent' => 'menu'
                                                                    ],
                                            'perbaikan'         => 
                                                                    [
                                                                        'parent' => 'menu'
                                                                    ],
                                            'berkas'            => 
                                                                    [
                                                                        'parent' => 'pengaturan'
                                                                    ]
                                        ],
                        'admin'     =>  [
                                            'pengaturan'             => 
                                                                    [
                                                                        'parent' => NULL
                                                                    ]
                                        ],
                        'user'      =>  [
                                            
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