<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Berkas;
use App\User;
use Carbon\Carbon;
use OjiSatriani\Fungsi;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class berkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berkas = Berkas::orderBy('id', 'desc')->get();
        return view('backend.berkas.index');
    }
    public function data(Request $request)
    {
        if ($request->ajax()) {
            $berkas = Berkas::orderBy('id', 'desc');
            return Datatables::of($berkas)
            ->addIndexColumn()
            ->addColumn('lampiran', function($berkas){
                return '<a href="'. $berkas->file_url .'">Download</a>';
            })
            ->addColumn(
                 'action',
                           '<center>
                               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" berkas-id="{{ $id }}" href="#edit-{{ $id }}">
                                   <i class="fa fa-pencil text-warning"></i>
                               </a>&nbsp; &nbsp;
                               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" berkas-id="{{ $id }}" href="#hapus-{{ $id }}" >
                                   <i class="fa fa-trash text-danger"></i>
                               </a>
                           </center>'
                        )
              ->rawColumns(['action', 'lampiran'])->make(true);
        } else {
            exit("Not an AJAX request -_-");
        }
    }

    public function data_detail(Request $request, $id)
    {
        if ($request->ajax()) {
            $users = Berkas::find($id)->user;
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
        return view('backend.berkas.tambah');
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
            'nama'		    => 'required',
            'lampiran'		=> 'required',
          ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            $path       = NULL;
            $namafile   = NULL;
            if($request->hasFile('lampiran')){
                $file = Storage::putFile('berkas/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('lampiran'));
            }
            $request->request->add([
                'file'  =>  [    
                                'disk'      => config('filesystems.default'),
                                'target'    => $file,
                            ],           
            ]);
            if (Berkas::create($request->all())) {
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
        $berkas = Berkas::find($id);
        return view('backend.berkas.detail', compact('berkas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berkas = Berkas::find($id);
        return view('backend.berkas.ubah', compact('berkas'));
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
          ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            $berkas = Berkas::find($id);
            if($request->hasFile('lampiran')){
                $berkas->hapus_lampiran();
                $file = Storage::putFile('berkas/'.date('Y').'/'.date('m').'/'.date('d'),$request->file('lampiran'));
                $request->request->add([
                            'file'  =>  [    
                                            'disk'      => config('filesystems.default'),
                                            'target'    => $file,
                                        ],           
                ]);
            }
            if (Berkas::find($id)->update($request->all())) {
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
        $berkas = Berkas::find($id);
        return view('backend.berkas.hapus', compact('berkas'));
    }

    public function destroy($id)
    {
        $berkas = Berkas::find($id);
        if ($berkas->delete()) {
            $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil dihapus']);
        } else {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal dihapus']);
        }
        return response()->json($respon);
    }

    public function download($id,$gbr)
    {
        $berkas = Berkas::find($id);
        return $berkas->file_download;
    }
}
