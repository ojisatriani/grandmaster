<?php

use Illuminate\Database\Seeder;

class aksesSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $submenus    = DB::table('submenus')->whereIn('kode', config('master.aksesgrup.root.submenu'))->get();
        foreach ($submenus as $submenu) {
            DB::table('aksessubmenus')->insert([['submenu_id'=>$submenu->id,'aksesgrup_id'=>1]]);
        }
    }
}
