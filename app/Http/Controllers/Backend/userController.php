<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Loginlog;
use App\Aksesgrup;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function masuk(Request $request)
    {
        $validator = Validator::make($request->all(), [
                       'username' => 'required',
                       'password' => 'required',
                       ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            $userdata   = array(
                                'username' => $request->input('username'),
                                'password' => base64_decode($request->input('password')),
                            );
            if (\Auth::attempt($userdata, $request->ingatkansaya)) {
                Loginlog::create(['username'=>$request->input('username'), 'ip'=>$this->alamatIp()]);
                $respon = array('status'=>true, 'pesan' => ['msg' => 'Berhasil login']);
                $request->session()->flash('selamat-datang', 'Selamat Datang di Halaman Administrator');
            } else {
                $respon = array("status"=>false,"pesan"=> ['msg' => 'Gagal Login, Username atau Password salah!!']);
            }
        }
        return response()->json($respon);
    }
    
    public function index()
    {
        return view('backend.user.index');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            $user = User::byLevel();
            return Datatables::of($user)
            ->addIndexColumn()
            ->addColumn(
                 'action',
                           '<center>
                               <a class="edit ubah" data-toggle="tooltip" data-placement="top" title="Edit" user-id="{{ $id }}" href="#edit-{{ $id }}">
                                   <i class="fa fa-pencil text-warning"></i>
                               </a>&nbsp; &nbsp;
                               <a class="delete hidden-xs hidden-sm hapus" data-toggle="tooltip" data-placement="top" title="Delete" href="#hapus-{{ $id }}" user-id="{{ $id }}">
                                   <i class="fa fa-trash text-danger"></i>
                               </a>
                           </center>'
                         )
               ->editColumn('status', function ($user) {
                   $status  = $user->status == 1 ? '<span class="badge badge-pill badge-info">Aktif</span>':'<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
                   return '<center>'.$status.'</center>';
               })
               ->editColumn('aksesgrup', function ($user) {
                   $aksesgrup =  $user->aksesgrup === NULL ? '-':$user->aksesgrup->nama;
                   return '<center>'.$aksesgrup.'</center>';
               })
              ->addColumn('level', function ($user) {
                    if($user->level == 1)
                    {
                        $badge = 'success';
                    } elseif ($user->level==2) {
                        $badge = 'primary';
                    } elseif ($user->level==3) {
                        $badge = 'secondary';
                    } else {
                        $badge = 'danger';
                    }
                  return '<center><span class="badge badge-pill badge-'.$badge.'">'.config("master.level.".$user->level).'</span></center>';
              })
                ->rawColumns(['status','level', 'action', 'aksesgrup'])->make(true);
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
        $aksesgrup       = Aksesgrup::byLevel()->pluck('nama', 'id');
        return view('backend.user.tambah', compact('aksesgrup'));
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
                'nama'              => 'required|string|max:255',
                'username'          => 'required|string|max:50|unique:users',
                'password'          => 'min:6',
                'aksesgrup_id'      => 'required',
                'level'             => 'required',
         ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            if (User::create($request->all())) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $aksesgrup       = Aksesgrup::byLevel()->pluck('nama', 'id');
        return view('backend.user.ubah', compact('user', 'aksesgrup'));
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
            'nama'              => 'required|string|max:255',
            'password'          => 'nullable|min:6',
            'aksesgrup_id'      => 'required',
            'level'             => 'required',
       ]);
        if ($validator->fails()) {
            $respon = array('status'=>false, 'pesan' => $validator->messages());
        } else {
            $user = User::find($id);
            if ($request->has('password')) {
                $update = $user->update($request->all());
            } else {
                $update = $user->update($request->except('password'));
            }
            if ($update) {
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
        $user = User::find($id);
        return view('backend.user.hapus', ['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->id == \Auth::id()) {
            return response()->json(array('status'=>false, 'pesan' => ['msg' => 'Maaf, tidak bisa menghapus akun sendiri. Silahkan Hubungi Administrator..']));
        }
        if ($user->delete()) {
            $respon = array('status'=>true, 'pesan' => ['msg' => 'Data berhasil dihapus']);
        } else {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Data gagal dihapus']);
        }
        return response()->json($respon);
    }

    public function ubahpassword($id)
    {
        if ($id == \Auth::user()->id) {
            $user = User::find($id);
            return view('backend.user.ubah_password', compact('user'));
        }
        // return view('backend.main.404');
    }

    public function resetpassword(Request $request)
    {
        if (\Auth::user()->id != $request->input('id')) {
            $respon = array('status'=>false, 'pesan' => ['msg' => 'Tidak ada akses']);
        } else {
            $user = User::find($request->input('id'));
            $nullable = $user->password == null ? 'nullable|':'';
            $validator = Validator::make($request->all(), [
                             'password_lama'           => $nullable.'required',
                             'password'                => 'required|min:6|confirmed',
                             'password_confirmation'   => 'required|min:6',
                             ]);
            if ($validator->fails()) {
                $respon = array('status'=>false, 'pesan' =>  $validator->messages());
            } else {
                if ($user->password == null) {
                    if (User::find($request->input('id'))->update($request->all())) {
                        $respon = array('status'=>true, 'next_url'=> $request->next_url, 'pesan' => ['msg' => 'Password Berhasil diubah']);
                    } else {
                        $respon = array('status'=>false, 'pesan' => ['msg' => 'Password Gagal diubah']);
                    }
                } elseif (\Hash::check(base64_decode(trim($request->input('password_lama'))), \Auth::user()->password) && $user->password != null) {
                    if (User::find($request->input('id'))->update($request->all())) {
                        $respon = array('status'=>true, 'next_url'=> $request->next_url, 'pesan' => ['msg' => 'Password Berhasil diubah']);
                    } else {
                        $respon = array('status'=>false, 'pesan' => ['msg' => 'Password Gagal diubah']);
                    }
                } else {
                    $respon = array('status'=>false, 'pesan' => ['msg' => 'Password Lama salah']);
                }
            }
        }
        return response()->json($respon);
    }
}
