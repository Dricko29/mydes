<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use App\Models\DokumentasiPembangunan;
use App\Http\Requests\StoreDokumentasiPembangunanRequest;
use App\Http\Requests\UpdateDokumentasiPembangunanRequest;

class DokumentasiPembangunanController extends Controller
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
    public function index()
    {
        $pageConfigs = ['contentLayout' => 'content-detached-right-sidebar', 'bodyClass' => 'content-detached-right-sidebar'];

        $breadcrumbs = [['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Pages"], ['link' => "javascript:void(0)", 'name' => "Blog"], ['name' => "List"]];
        return view('desa.dokumentasi-pembangunan.index', compact(
            'pageConfigs',
            'breadcrumbs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDokumentasiPembangunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDokumentasiPembangunanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokumentasiPembangunan  $dokumentasiPembangunan
     * @return \Illuminate\Http\Response
     */
    public function show(DokumentasiPembangunan $dokumentasiPembangunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DokumentasiPembangunan  $dokumentasiPembangunan
     * @return \Illuminate\Http\Response
     */
    public function edit(DokumentasiPembangunan $dokumentasiPembangunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDokumentasiPembangunanRequest  $request
     * @param  \App\Models\DokumentasiPembangunan  $dokumentasiPembangunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDokumentasiPembangunanRequest $request, DokumentasiPembangunan $dokumentasiPembangunan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DokumentasiPembangunan  $dokumentasiPembangunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DokumentasiPembangunan $dokumentasiPembangunan)
    {
        //
    }
}