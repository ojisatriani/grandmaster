<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Menu;
use App\Submenu;
use App\Aksesmenu;
use App\Aksessubmenu;
use App\Aksesgrup;
use Yajra\DataTables\Facades\DataTables;

class aksesmenuController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('menu')) {
            Aksesmenu::where('aksesgrup_id', $request->input('id'))->delete();
            // Aksessubmenu::where('aksesgrup_id', $request->input('id'))->delete();
            $aksesgrupid = $request->input('id');
            $noMenu		= 0;
            $noSubMenu	= 0;
            foreach ($request->input('menu') as $menu => $value) {
                $aksesmenu = new Aksesmenu;
                $aksesmenu->aksesgrup_id		= $aksesgrupid;
                $aksesmenu->menu_id			= $value;
                if ($aksesmenu->save()) {
                    $noMenu++;
                }
            }
            $respon = array("status"=>true,'next_url'=>$request->url, "pesan"=> ['msg' => $noMenu.' menu, '.$noSubMenu.' submenu tersimpan']);
        }
        return (json_encode($respon));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aksesgrup  = Aksesgrup::find($id);
        $aksesmenu  = Aksesmenu::gabungMenu($id)->get();
        $menus      = Menu::whereNull('parent_id')->latest()->get();
        return view('backend.aksesmenu.index', compact('aksesgrup', 'aksesmenu', 'menus'));
    }

}
