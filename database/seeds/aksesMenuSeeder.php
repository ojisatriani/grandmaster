<?php

use Illuminate\Database\Seeder;
use App\Aksesgrup;
class aksesMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('master.aksesgrup') as $key => $value) {
            $menus    = DB::table('menus')->whereIn('kode', config('master.aksesgrup.'.$key.'.menu'))->get();
            foreach ($menus as $menu) {
                $aksesgrup = Aksesgrup::whereAlias($key)->first();
                if($aksesgrup !== NULL)
                {
                    DB::table('aksesmenus')->insert([['menu_id'=>$menu->id,'aksesgrup_id'=>$aksesgrup->id]]);
                }
            }
        }
    }
}
