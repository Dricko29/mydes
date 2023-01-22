<?php

namespace App\Http\Controllers\Akun;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermohonanSurat;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StorePermohonanSuratRequest;
use App\Notifications\PermohonanSuratNotification;

class StorePermohonanSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StorePermohonanSuratRequest $request)
    {

        $users = User::with('roles')->get();
        $nonuser = $users->reject(function ($user, $key) {
            return $user->hasRole('user');
        });
        if ($request->hasfile('dokumen')) {
            $files = array();
            foreach ($request->file('dokumen') as $file) {
                if ($file->isValid()) {
                    $dokumen = $file->store('surat/permohonan/'.$request->penduduk_id.'/');
                    $files []  = $dokumen;
                }
            }
            $dataPermohonan = PermohonanSurat::create([
                'surat_id' => $request->surat_id,
                'penduduk_id' => $request->penduduk_id,
                'ket' => $request->ket,
                'tlp_aktif' => $request->tlp_aktif,
                'dokumen' => json_encode($files)
            ]);
            Notification::send($nonuser, new PermohonanSuratNotification($dataPermohonan));
        } else {
            
            $dataPermohonan = PermohonanSurat::create([
                'surat_id' => $request->surat_id,
                'penduduk_id' => $request->penduduk_id,
                'ket' => $request->ket,
                'tlp_aktif' => $request->tlp_aktif,
            ]);
            Notification::send($nonuser, new PermohonanSuratNotification($dataPermohonan));
        }

        return redirect()->route('user.surat.user')->with('success', __('Permohonan Terkirim!'));
    }
}