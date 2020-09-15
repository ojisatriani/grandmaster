<?php

use Illuminate\Database\Seeder;

class aksesGrupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();    
        DB::table('aksesgrups')->truncate();

        $isi = [
                    [
                        'nama' 			=> 'Root',
                        'alias'         => 'root'
                    ],
                    [
                        'nama' 			=> 'Admin',
                        'alias'         => 'admin'
                    ],
                    [
                        'nama' 			=> 'User',
                        'alias'         => 'user'
                    ],
                ];
        DB::table('aksesgrups')->insert($isi);
        Schema::enableForeignKeyConstraints();
    }
}
