<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(aksesGrupSeeder::class);
        $this->call(menuSeeder::class);
        // $this->call(subMenuSeeder::class);
        $this->call(aksesMenuSeeder::class);
        // $this->call(aksesSubMenuSeeder::class);
        $this->call(userSeeder::class);
        $this->command->info("Login dengan \n username : ". with(new userSeeder)->userpass ."\n password : ".with(new userSeeder)->userpass);
    }
}
