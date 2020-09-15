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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function data(Request $request, $id)
    {
        // cek ajax request
        if ($request->ajax()) {
            $aksesmenu = Aksesmenu::where('aksesgrup_id', $id)->latest();
            return Datatables::of($aksesmenu)
            ->addColumn('nama', function ($aksesmenu) {
                return $aksesmenu->menu->nama;
            })
            ->addColumn('submenu', function ($aksesmenu) {
                $sub = '';
                foreach ($aksesmenu->aksesgrup->aksessubmenu as $akses) {
                    if ($aksesmenu->menu_id == $akses->submenu->menu_id) {
                        $sub .= $akses->submenu->nama .',';
                    }
                }
                return $sub;
            })
            ->rawColumns(['submenu','nama'])->make(true);
        } else {
            exit("Not an AJAX request -_-");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // if (\Auth::user()->as_root == 1) {
            $menu = Menu::all();
        // } else {
        //     $akses = [];
        //     foreach (\Auth::user()->aksesgrup->aksesmenu as $mn) {
        //         $akses[] = $mn->menu_id;
        //     }
        //     $menu = Menu::whereIn('id', $akses)->get();
        // }

        $aksesgrup = Aksesgrup::find($id);
        return view('backend.aksesmenu.tambah', compact('menu', 'aksesgrup'));
    }

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
            Aksessubmenu::where('aksesgrup_id', $request->input('id'))->delete();
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
            foreach ($request->input('submenu') as $m => $v) {
                $aksessubmenu = new Aksessubmenu;
                $aksessubmenu->submenu_id	= $v;
                $aksessubmenu->aksesgrup_id		= $aksesgrupid;
                if ($aksessubmenu->save()) {
                    $noSubMenu++;
                }
            }
            $respon = array("status"=>true,"pesan"=> ['msg' => $noMenu.' menu, '.$noSubMenu.' submenu tersimpan']);
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
        $aksesgrup = Aksesgrup::find($id);
        return view('backend.aksesmenu.index', compact('aksesgrup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
