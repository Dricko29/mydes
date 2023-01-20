<?php

namespace App\Http\Controllers\LayananMandiri;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\LayananMandiri;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreLayananMandiriRequest;
use App\Http\Requests\UpdateLayananMandiriRequest;
use App\Notifications\RegisteredLayananMandiriEmailNotification;

class LayananMandiriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|petugas|kades']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = LayananMandiri::with('penduduk', 'user');
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('user.email', function(LayananMandiri $layananMandiri){
                    return $layananMandiri->user->email ? $layananMandiri->user->email : '-' ;
                })
                ->addColumn('last_login', function(LayananMandiri $layananMandiri){
                    $session = DB::table('sessions')->where('user_id', '=', $layananMandiri->user_id)->first();
                    if ($session) {
                        return '<span class="badge bg-success">Online</span>';
                    } else {
                        return '<span class="badge bg-warning">Offline</span>';
                    }
                })
                ->editColumn('created_at', function($model){
                    return Carbon::parse($model->created_at)->format('d-m-Y');
                })
                ->editColumn('status', function($model){
                    if ($model->status == 1) {
                        return '<span class="badge bg-warning">Sedang Diverifikasi</span>';
                    } elseif($model->status == 2) {
                        return '<span class="badge bg-success">Terverifikasi</span>';
                    }
                })
                ->rawColumns(['last_login', 'status'])
                ->make(true);
        }
        return view('desa.layanan-mandiri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduks = Penduduk::with('layananMandiri')->get();
        return view('desa.layanan-mandiri.create', compact('penduduks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLayananMandiriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLayananMandiriRequest $request)
    {        
        try {
            DB::beginTransaction();
            $penduduk = Penduduk::findOrFail($request->penduduk_id)->first();
            $user =  User::create([
                'name' => $penduduk->nama,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ])->assignRole('user');
            $layananMandiri = LayananMandiri::create([
                'penduduk_id' => $penduduk->id,
                'user_id' => $user->id,
                'nama' => $penduduk->nama,
                'nik' => $penduduk->nik,
                'no_keluarga' => $request->no_keluarga,
                'email' => $request->email,
                'no_tlp' => $request->no_tlp,
                'password' => Hash::make('password'),
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
        $user->notify(new RegisteredLayananMandiriEmailNotification($user));
        return redirect()->route('site.layananMandiri.index')->with('success', __('Data Created Successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LayananMandiri  $layananMandiri
     * @return \Illuminate\Http\Response
     */
    public function show(LayananMandiri $layananMandiri)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayananMandiri  $layananMandiri
     * @return \Illuminate\Http\Response
     */
    public function edit(LayananMandiri $layananMandiri)
    {
        $dokumens = json_decode($layananMandiri->dokumen);
        return view('desa.layanan-mandiri.edit', compact('layananMandiri', 'dokumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLayananMandiriRequest  $request
     * @param  \App\Models\LayananMandiri  $layananMandiri
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLayananMandiriRequest $request, LayananMandiri $layananMandiri)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $layananMandiri->nama,
                'email' => $layananMandiri->email,
                'password' => $layananMandiri->password
            ]);
            $user->assignRole('user');
        
            $penduduk = Penduduk::where('nik', $layananMandiri->nik)->first();
            $layananMandiri->forceFill([
                'penduduk_id' => $penduduk->id,
                'user_id' => $user->id,
                'status' => 2
            ])->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('site.layananMandiri.index')->with('error',$th->getMessage());
        }
        $user->notify(new RegisteredLayananMandiriEmailNotification($user));
        return redirect()->route('site.layananMandiri.index')->with('success',__('Data Verified'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayananMandiri  $layananMandiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayananMandiri $layananMandiri)
    {
        $akun = User::find($layananMandiri->user_id);
        $layananMandiri->delete();
        $akun->deleteProfilePhoto();
        $akun->tokens->each->delete();
        $akun->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!')
        ]);
    }
}