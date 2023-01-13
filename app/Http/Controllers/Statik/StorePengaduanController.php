<?php

namespace App\Http\Controllers\Statik;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StorePengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            // return $request;
            $request->validate([
                'nama' => ['required', 'max:255'],
                'nik' => ['required', 'digits:16', 'numeric'],
                'email' => ['nullable', 'email'],
                'tlp' => ['nullable', 'max:12'],
                'judul' => ['required', 'max:255'],
                'isi' => ['required','string', 'max:255'],
            ]);
            if ($request->file('foto')) {
                $foto = $request->file('foto')->store('desa/pengaduan/foto');
            } else {
                $foto = '';
            }
            
            Pengaduan::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'judul' => $request->judul,
                'email' => $request->email,
                'tlp' => $request->tlp,
                'foto' => $foto,
                'isi' => $request->isi,
            ]);
            return redirect()->route('pengaduan')->with('success', __('Your complaint has been sent'));
        } catch (\Throwable $th) {
            return redirect()->route('pengaduan')->with('error', __('Whoops! Something went wrong.'));
            
        }
    }
}