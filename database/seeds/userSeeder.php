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
        
        DB::table('users')->insert([
                    'nama'                  => 'Root Administrator',
                    'username'              => $this->userpass,
                    'email'                 => 'root@google.com',
                    'password'              => bcrypt($this->userpass),
                    'aksesgrup_id'          => 1,
                    'level'                 => 1,
                    'email_verified_at'     => date("Y-m-d H:i:s"),
                ]);
        Schema::enableForeignKeyConstraints();
    }
}
