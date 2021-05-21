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
						'status' 		=> 1,
						'tampil' 		=> 0,
					],
					[
						'kode' 			=> 'pengaturanroot', // 2
						'nama' 			=> 'Pengaturan Root',
						'link' 			=> 'pengaturanroot',
						'icon' 			=> 'fa-android',
						'status' 		=> 1,
						'tampil' 		=> 1,
					],
					[
						'kode' 			=> 'pengaturan', // 3
						'nama' 			=> 'Pengaturan',
						'link' 			=> 'Pengaturan',
						'icon' 			=> 'fa-cogs',
						'status' 		=> 1,
						'tampil' 		=> 1,
					],
					[
						'kode' 			=> 'extra', // 4
						'nama' 			=> 'extra',
						'link' 			=> 'extra',
						'icon' 			=> 'fa-cogs',
						'status' 		=> 0,
						'tampil' 		=> 1,
					],
					[
					  'parent_id'		=> 2,  //pengaturan root
					  'kode'			=> 'menu',
					  'nama'			=> 'Menu',
					  'link'			=> 'menu',
					  'icon'			=> 'fa-cogs',
					  'status'			=> 1,
					  'tampil'			=> 1,
					],
					[
					  'parent_id'		=> 5, //pengaturan root
					  'kode'			=> 'user',
					  'nama'			=> 'User',
					  'link'			=> 'user',
					  'icon'			=> 'fa-users',
					  'status'			=> 1,
					  'tampil'			=> 1,
					],
					[
					  'parent_id'		=> 2, //pengaturan root
					  'kode'			=> 'aksesgrup',
					  'nama'			=> 'Akses Grup',
					  'link'			=> 'aksesgrup',
					  'icon'			=> 'fa-arrow-circle-right',
					  'status'			=> 1,
					  'tampil'			=> 1,
					],
					[
						'parent_id'		=> 4, //extra
						'kode'			=> 'aksesmenu',
						'nama'			=> 'Aksesmenu',
						'link'			=> 'aksesmenu',
						'icon' 			=> 'fa-arrow-circle-right',
						'status'		=> 0,
						'tampil'		=> 1,
					],
					[
						'parent_id'		=> 4, //extra
						'kode'			=> 'submenu',
						'nama'			=> 'Submenu',
						'link'			=> 'submenu',
						'icon'			=> 'fa-arrow-circle-right',
						'status'		=> 0,
						'tampil'		=> 1,
					],
					[
						'parent_id'		=> 4, //extra
						'kode'			=> 'perbaikan',
						'nama'			=> 'Perbaikan',
						'link'			=> 'perbaikan',
						'icon'			=> 'fa-arrow-circle-right',
						'status'		=> 0,
						'tampil'		=> 1,
					],
					[
						'parent_id'		=> 3, //pengaturan
						'kode'			=> 'berkas',
						'nama'			=> 'Berkas',
						'link'			=> 'berkas',
						'icon'			=> 'fa-archive',
						'status'		=> 1,
						'tampil'		=> 1,
					],
				];
		foreach ($isi as $data) {
			Menu::create($data);
		}
		Schema::enableForeignKeyConstraints();
    }
}
