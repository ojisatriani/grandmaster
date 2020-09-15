<?php

use Illuminate\Database\Seeder;

class aksesMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus    = DB::table('menus')->whereIn('kode', config('master.aksesgrup.root.menu'))->get();
        foreach ($menus as $menu) {
            DB::table('aksesmenus')->insert([['menu_id'=>$menu->id,'aksesgrup_id'=>1]]);
        }
    }
}
