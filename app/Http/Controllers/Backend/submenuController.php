<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Menu;
use App\Submenu;
use Yajra\DataTables\Facades\DataTables;

class submenuController extends Controller
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
        if ($request->ajax()) {
            $submenu = Submenu::latest()->where('menu_id', $id);
            return Datatables::of($submenu)
            ->addIndexColumn()
            ->addColumn(
                'action',
                          '<center>
                              <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" submenu-id="{{ $id }}" href="#edit-{{ $id }}">
                                  <i class="fa fa-pencil text-warning"></i>
                              </a>&nbsp; &nbsp;
                              <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" submenu-id="{{ $id }}">
                                  <i class="fa fa-trash text-danger"></i>
                              </a>
                          </center>'
                        )
              ->addColumn('tampilkan', function ($submenu) {
                  $status  = $submenu->status == 1 ? '<span class="badge badge-pill badge-info">Tampil</span>':'<span class="badge badge-pill badge-danger">Tidak Tampil</span>';
                  $private = $submenu->tampil == 1 ? '<span class="badge badge-pill badge-primary">Private</span>':'<span class="badge badge-pill badge-success">Public</span>';
                  return '<center>'.$status .'&nbsp;&nbsp;'. $private.'</center>';
              })
               ->rawColumns(['tampilkan', 'action'])->make(true);
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
        return view('backend.submenu.tambah');
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
            'menu_id'	=> 'required',
            'nama'		=> 'required',
            'kode'		=> 'required|unique:submenus|unique:menus',
            'link'		=> 'required|unique:submenus|unique:menus',
            'icon'		=> 'required',
            'status'	=> 'required',
            'tampil'	=> 'required',
        ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (Submenu::create($request->all())) {
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
        return view('backend.submenu.index', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submenu    = Submenu::find($id);
        $menu       = Menu::all()->pluck('nama', 'id');
        return view('backend.submenu.ubah', ['submenu' => $submenu, 'menu' => $menu]);
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
          'kode'		=> 'required|unique:submenus,kode,'.$id.'|unique:menus,kode,'.$request->input('menu_id'),
          'link'		=> 'required|unique:submenus,kode,'.$id.'|unique:menus,kode,'.$request->input('menu_id'),
          'icon'		=> 'required',
          'status'	=> 'required',
          'tampil'	=> 'required',
      ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (Submenu::find($id)->update($request->all())) {
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
        $submenu = Submenu::find($id);
        return view('backend.submenu.hapus', ['submenu' => $submenu]);
    }
    public function destroy($id)
    {
        $submenu = Submenu::find($id);
        if ($submenu->delete()) {
            $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil dihapus']);
        } else {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal dihapus']);
        }
        return response()->json($respon);
    }
}
