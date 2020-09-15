<?php

use Illuminate\Database\Seeder;

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
						'kode' => 'pengaturanroot', // 1
						'nama' => 'Pengaturan Root',
						'link' => 'pengaturanroot',
						'icon' => 'fa-android',
						'status' => 1,
						'tampil' => 1,
					],
					[
						'kode' => 'pengaturan', // 2
						'nama' => 'Pengaturan',
						'link' => 'Pengaturan',
						'icon' => 'fa-cogs',
						'status' => 1,
						'tampil' => 1,
					],
					[
						'kode' => 'extra', // 3
						'nama' => 'extra',
						'link' => 'extra',
						'icon' => 'fa-cogs',
						'status' => 0,
						'tampil' => 1,
					],
				];
		DB::table('menus')->insert($isi);
		Schema::enableForeignKeyConstraints();
    }
}
