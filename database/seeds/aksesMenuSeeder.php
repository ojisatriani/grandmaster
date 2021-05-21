<?php

use Illuminate\Database\Seeder;
use App\Aksesgrup;
use App\Menu;
use App\Aksesmenu;
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
            foreach (config('master.aksesgrup.'. $key) as $kode => $parent) {
                $menu    = Menu::whereKode($kode)->latest()->first();
                if($menu !== NULL)
                {
                    $aksesgrup = Aksesgrup::whereAlias($key)->first();
                    if($aksesgrup !== NULL)
                    {
                        Aksesmenu::create(['menu_id'=>$menu->id,'aksesgrup_id'=>$aksesgrup->id]);
                    }
                }
            }
        }
    }
}
