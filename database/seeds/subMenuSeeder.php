<?php

use Illuminate\Database\Seeder;

class subMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
		DB::table('submenus')->truncate();
		
        $isi = [
					[
					  'menu_id'		=> 1,  //pengaturan root
					  'kode'		=> 'menu',
					  'nama'		=> 'Menu',
					  'link'		=> 'menu',
					  'icon'		=> 'fa-cogs',
					  'status'		=> 1,
					  'tampil'		=> 1,
					],
                 
					[
					  'menu_id'		=> 1, //pengaturan root
					  'kode'		=> 'user',
					  'nama'		=> 'User',
					  'link'		=> 'user',
					  'icon'		=> 'fa-users',
					  'status'		=> 1,
					  'tampil'		=> 1,
					],
                  
					[
					  'menu_id'		=> 1, //pengaturan root
					  'kode'		=> 'aksesgrup',
					  'nama'		=> 'Akses Grup',
					  'link'		=> 'aksesgrup',
					  'icon'		=> 'fa-arrow-circle-right',
					  'status'		=> 1,
					  'tampil'		=> 1,
					],
				
					[
						'menu_id'	=> 3, //extra
						'kode'		=> 'aksesmenu',
						'nama'		=> 'Aksesmenu',
						'link'		=> 'aksesmenu',
						'icon' 		=> 'fa-arrow-circle-right',
						'status'	=> 0,
						'tampil'	=> 1,
					],
                  
					[
						'menu_id'	=> 3, //extra
						'kode'		=> 'submenu',
						'nama'		=> 'Submenu',
						'link'		=> 'submenu',
						'icon'		=> 'fa-arrow-circle-right',
						'status'	=> 0,
						'tampil'	=> 1,
					],
					[
						'menu_id'	=> 3, //extra
						'kode'		=> 'perbaikan',
						'nama'		=> 'Perbaikan',
						'link'		=> 'perbaikan',
						'icon'		=> 'fa-arrow-circle-right',
						'status'	=> 0,
						'tampil'	=> 1,
					],
				];
				DB::table('submenus')->insert($isi);
				Schema::enableForeignKeyConstraints();
	}
}
