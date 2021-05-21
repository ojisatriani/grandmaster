<?php

use Illuminate\Database\Seeder;
use App\Menu;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
		DB::table('menus')->truncate();

        $isi = 	[
					[
						'kode' 			=> 'home', // 1
						'nama' 			=> 'Beranda',
						'link' 			=> 'home',
						'icon' 			=> 'fa-home',
						'tampilkan' 	=> 1,
						'private' 		=> 0,
					],
					[
						'kode' 			=> 'pengaturanroot', // 2
						'nama' 			=> 'Pengaturan Root',
						'link' 			=> 'pengaturanroot',
						'icon' 			=> 'fa-android',
						'tampilkan' 	=> 1,
						'private' 		=> 1,
					],
					[
						'kode' 			=> 'pengaturan', // 3
						'nama' 			=> 'Pengaturan',
						'link' 			=> 'Pengaturan',
						'icon' 			=> 'fa-cogs',
						'tampilkan' 	=> 1,
						'private' 		=> 1,
					],
					[
					  'parent_id'		=> 2,  //pengaturan root
					  'kode'			=> 'menu', //4
					  'nama'			=> 'Menu',
					  'link'			=> 'menu',
					  'icon'			=> 'fa-cogs',
					  'tampilkan'		=> 1,
					  'private'			=> 1,
					],
					[
					  'parent_id'		=> 2, //pengaturan root
					  'kode'			=> 'user', //5
					  'nama'			=> 'User',
					  'link'			=> 'user',
					  'icon'			=> 'fa-users',
					  'tampilkan'		=> 1,
					  'private'			=> 1,
					],
					[
					  'parent_id'		=> 2, //pengaturan root
					  'kode'			=> 'aksesgrup', //6
					  'nama'			=> 'Akses Grup',
					  'link'			=> 'aksesgrup',
					  'icon'			=> 'fa-arrow-circle-right',
					  'tampilkan'		=> 1,
					  'private'			=> 1,
					],
					[
						'parent_id'		=> 6, //aksesgrup
						'kode'			=> 'aksesmenu', // 7
						'nama'			=> 'Aksesmenu',
						'link'			=> 'aksesmenu',
						'icon' 			=> 'fa-arrow-circle-right',
						'tampilkan'		=> 0,
						'private'		=> 1,
					],
					[
						'parent_id'		=> 4, //menu
						'kode'			=> 'submenu', // 8
						'nama'			=> 'Submenu',
						'link'			=> 'submenu',
						'icon'			=> 'fa-arrow-circle-right',
						'tampilkan'		=> 0,
						'private'		=> 1,
					],
					[
						'parent_id'		=> 4, //menu
						'kode'			=> 'perbaikan', // 9
						'nama'			=> 'Perbaikan',
						'link'			=> 'perbaikan',
						'icon'			=> 'fa-arrow-circle-right',
						'tampilkan'		=> 0,
						'private'		=> 1,
					],
					[
						'parent_id'		=> 3, //pengaturan
						'kode'			=> 'berkas', // 10
						'nama'			=> 'Berkas',
						'link'			=> 'berkas',
						'icon'			=> 'fa-archive',
						'tampilkan'		=> 1,
						'private'		=> 1,
					],
				];
		foreach ($isi as $data) {
			Menu::create($data);
		}
		Schema::enableForeignKeyConstraints();
    }
}
