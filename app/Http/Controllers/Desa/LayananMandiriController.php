<?php

namespace App\Http\Controllers\Desa;

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

class LayananMandiriController extends Controller
{
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
                ->rawColumns(['last_login'])
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
            $akun =  User::create([
                'name' => $penduduk->nama,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ])->assignRole('user');
            $layananMandiri = LayananMandiri::create($request->validated()+['user_id' => $akun->id]);
            DB::commit();
            return redirect()->route('site.layananMandiri.index')->with('success', __('Data Created Successfully!'));
        } catch (\Throwable $th) {
            DB::rollBack();
            // return redirect()->back()->with('error', __('Whoops! Something went wrong.'));
            return redirect()->back()->with('error', $th->getMessage());
        }
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
        return abort(404);
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
        return abort(404);
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