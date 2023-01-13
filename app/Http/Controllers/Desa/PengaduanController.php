<?php

namespace App\Http\Controllers\Desa;

use Carbon\Carbon;
use App\Models\Pengaduan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TanggapanPengaduan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StorePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Pengaduan::latest();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->editColumn('isi', function ($model) {
                    return Str::limit($model->isi, 30, '...');
                })
                ->editColumn('status', function ($model) {
                    if ($model->status == 0) {
                        return '<span class="badge bg-danger">Menunggu Diproses</span>';
                    } elseif ($model->status == 1) {
                        return '<span class="badge bg-warning">Sedang Diproses</span>';
                    } else {
                        return '<span class="badge bg-success">Sudah Diproses</span>';
                    }
                })
                ->editColumn('created_at', function ($model) {
                    return Carbon::parse($model->created_at)->format('d-m-Y');
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        // return $request->status;
        return view('desa.pengaduan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePengaduanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengaduanRequest $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('desa.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        $respon = TanggapanPengaduan::where('pengaduan_id', $pengaduan->id)->where('created_by', Auth::user()->id)->first();
        return view('desa.pengaduan.edit', compact('pengaduan', 'respon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengaduanRequest  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengaduanRequest $request, Pengaduan $pengaduan)
    {
        try {
            $id = $pengaduan->id;
            DB::beginTransaction();
            $pengaduan->forceFill([
                'status' => $request->status
            ])->save();
            
            TanggapanPengaduan::create([
                'pengaduan_id' => $pengaduan->id,
                'respon' => $request->respon
            ]);
            DB::commit();
            return redirect()->route('site.pengaduan.index')->with('success', __('Data Updated Successfully!'));
        } catch (\Throwable $th) {
            DB::rollBack();
            // return redirect()->route('site.pengaduan.index')->with('error', __('Whoops! Something went wrong.'));
            return redirect()->route('site.pengaduan.index')->with('error', $th->getMessage());
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return response()->json([
            'status' => 'success',
            'msg' => __('Data Deleted Successfully!')
        ]);
    }
}