<?php

use Illuminate\Database\Seeder;
use App\Aksesgrup;

class aksesSubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('master.aksesgrup') as $key => $value) {
            $submenus    = DB::table('submenus')->whereIn('kode', config('master.aksesgrup.'. $key .'.submenu'))->get();
            foreach ($submenus as $submenu) {
                $aksesgrup = Aksesgrup::whereAlias($key)->first();
                if($aksesgrup !== NULL)
                {
                    DB::table('aksessubmenus')->insert([['submenu_id'=>$submenu->id,'aksesgrup_id'=>$aksesgrup->id]]);
                }
            }
        }
    }
}
