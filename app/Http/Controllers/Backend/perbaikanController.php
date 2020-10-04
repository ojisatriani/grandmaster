<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Submenu;
use App\Aksesgrup;
use App\BolehAksesSubmenu;
use Yajra\DataTables\Facades\DataTables;

class perbaikanController extends Controller
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
            $bolehakses = Submenu::find($id)->boleh_akses_submenu()->with('aksesgrup');
            return Datatables::of($bolehakses)
             ->addColumn(
                 'action',
                           '<center>
                               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" perbaikan-id="{{ $id }}" href="#hapus-{{ $id }}" >
                                   <i class="fa fa-trash text-danger"></i>
                               </a>
                           </center>'
                        )
              ->rawColumns(['action', 'aksesmenu'])->make(true);
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
        $submenu        = Submenu::find($id);
        $bolehakses     = $submenu->boleh_akses_submenu()->pluck('aksesgrup_id');
        $aksesgrup      = Aksesgrup::whereNotIn('id',$bolehakses)->pluck('nama','id');
        return view('backend.perbaikan.tambah', compact('aksesgrup', 'submenu'));
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
            'aksesgrup_id'		=> 'required',
          ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if(BolehAksesSubmenu::create($request->all()))
            {
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
        $submenu = Submenu::find($id);
        return view('backend.perbaikan.index', compact('submenu'));
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

    public function hapus($id)
    {
        $perbaikan = BolehAksesSubmenu::find($id);
        return view('backend.perbaikan.hapus', compact('perbaikan'));
    }

    public function destroy($id)
    {
        $perbaikan = BolehAksesSubmenu::find($id);
        if ($perbaikan->delete()) {
            $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil dihapus']);
        } else {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal dihapus']);
        }
        return response()->json($respon);
    }
}
