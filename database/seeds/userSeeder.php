<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $userpass = 'root';
    public function run()
    {
        Schema::disableForeignKeyConstraints();
         $isi = 	[
                        [
                            'nama'                  => 'Root Administrator',
                            'username'              => $this->userpass,
                            'email'                 => $this->userpass.'@google.com',
                            'password'              => bcrypt($this->userpass),
                            'aksesgrup_id'          => 1,
                            'level'                 => 1,
                            'email_verified_at'     => date("Y-m-d H:i:s"),
                        ],
                        [
                            'nama'                  => 'Administrator',
                            'username'              => 'admin',
                            'email'                 => 'admin@google.com',
                            'password'              => bcrypt('qwerty12345'),
                            'aksesgrup_id'          => 2,
                            'level'                 => 2,
                            'email_verified_at'     => date("Y-m-d H:i:s"),
                        ],
                    ];
        DB::table('users')->insert($isi);
        Schema::enableForeignKeyConstraints();
    }
}
