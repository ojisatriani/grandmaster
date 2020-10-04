<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Aksesgrup;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class aksesgrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.aksesgrup.index');
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $aksesgrup = Aksesgrup::byLevel();
            return Datatables::of($aksesgrup)
            ->addIndexColumn()
            ->editColumn('nama', function($aksesgrup){
                return '<a href="'.url('aksesgrup/'.$aksesgrup->id).'" class="text-info">'.$aksesgrup->nama.'</a>';
            })
             ->addColumn(
                 'action',
                           '<center>
                               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" aksesgrup-id="{{ $id }}" href="#edit-{{ $id }}">
                                   <i class="fa fa-pencil text-warning"></i>
                               </a>&nbsp; &nbsp;
                               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" aksesgrup-id="{{ $id }}" href="#hapus-{{ $id }}" >
                                   <i class="fa fa-trash text-danger"></i>
                               </a>
                           </center>'
                        )
              ->addColumn('aksesmenu', '<center><a href="{{ url(config("master.url.admin")."/aksesmenu/".$id)  }}" class="ubah" data-toggle="tooltip" data-placement="top" title="Akses Menu"><i class="fa fa-external-link text-info"></i></a>')
              ->rawColumns(['action', 'aksesmenu', 'nama'])->make(true);
        } else {
            exit("Not an AJAX request -_-");
        }
    }

    public function data_detail(Request $request, $id)
    {
        if ($request->ajax()) {
            $users = Aksesgrup::find($id)->user;
            return Datatables::of($users)
            ->addIndexColumn()->make(true);
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
        return view('backend.aksesgrup.tambah');
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
            'alias'		=> 'required',
          ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (Aksesgrup::create($request->all())) {
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
        $aksesgrup = Aksesgrup::find($id);
        return view('backend.aksesgrup.detail', compact('aksesgrup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aksesgrup = Aksesgrup::find($id);
        return view('backend.aksesgrup.ubah', compact('aksesgrup'));
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
            'alias'		=> 'required',
          ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (Aksesgrup::find($id)->update($request->all())) {
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
        $aksesgrup = Aksesgrup::find($id);
        return view('backend.aksesgrup.hapus', compact('aksesgrup'));
    }

    public function destroy($id)
    {
        $aksesgrup = Aksesgrup::find($id);
        if ($aksesgrup->delete()) {
            $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil dihapus']);
        } else {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal dihapus']);
        }
        return response()->json($respon);
    }
}
