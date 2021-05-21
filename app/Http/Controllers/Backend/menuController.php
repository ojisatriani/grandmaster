<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Menu;
use Yajra\DataTables\Facades\DataTables;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.menu.index');
    }

    public function data(Request $request, $parent_id = NULL)
    {
        if ($request->ajax()) {
            $menu = Menu::where('parent_id', $parent_id)->latest();
            return Datatables::of($menu)
            ->addIndexColumn()
            ->addColumn(
                'action',
                          '<center>
                              <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" menu-id="{{ $id }}" href="#edit-{{ $id }}">
                                  <i class="fa fa-pencil text-warning"></i>
                              </a>&nbsp; &nbsp;
                              <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" menu-id="{{ $id }}" href="#hapus-{{ $id }}">
                                  <i class="fa fa-trash text-danger"></i>
                              </a>
                          </center>'
                        )
             ->addColumn('submenu', '<center><a href="{{ url(config("master.url.admin")."/menu/".$id)  }}" class="paket" data-toggle="tooltip" data-placement="top" title="Submenu"><i class="fa fa-external-link text-info"></i></a>')
             ->addColumn('status', function ($menu) {
                 $tampilkan  = $menu->tampilkan == 1 ? '<span class="badge badge-pill badge-info">Tampil</span>':'<span class="badge badge-pill badge-danger">Tidak Tampil</span>';
                 $private = $menu->private == 1 ? '<span class="badge badge-pill badge-primary">Private</span>':'<span class="badge badge-pill badge-success">Public</span>';
                 return '<center>'.$tampilkan .'&nbsp;&nbsp;'. $private.'</center>';
             })
               ->rawColumns(['status', 'action', 'submenu'])->make(true);
        } else {
            exit("Not an AJAX request -_-");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'		=> 'required',
            'kode'		=> 'required|unique:menus',
            'link'		=> 'required|unique:menus',
            'icon'		=> 'required',
            'tampilkan'	=> 'required',
            'private'	=> 'required',
        ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (Menu::create($request->all())) {
                $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil disimpan']);
            } else {
                $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal disimpan']);
            }
        }
        return response()->json($respon);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('backend.menu.index', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $parent = Menu::all()->pluck('nama', 'id');
        return view('backend.menu.ubah', ['menu' => $menu, 'parent'=>$parent]);
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
        $validator = Validator::make($request->all(), [
            'nama'		=> 'required',
            'kode'		=> 'required|unique:menus,kode,'.$id,
            'link'		=> 'required|unique:menus,kode,'.$id,
            'icon'		=> 'required',
            'tampilkan'	=> 'required',
            'private'	=> 'required',
        ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (Menu::find($id)->update($request->all())) {
                $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil diubah']);
            } else {
                $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal diubah']);
            }
        }
        return response()->json($respon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function hapus($id)
    {
        $menu = Menu::find($id);
        return view('backend.menu.hapus', ['menu' => $menu]);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if ($menu->delete()) {
            $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil dihapus']);
        } else {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal dihapus']);
        }
        return response()->json($respon);
    }
}
