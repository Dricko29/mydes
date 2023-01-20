<?php

namespace App\Http\Controllers\Akun\LayananMandiri;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\LayananMandiri;
use Laravel\Jetstream\Jetstream;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\PasswordValidationRules;
use App\Notifications\RegisterLayananMandiriEmailNotification;

class RegisteredLayananMandiriController extends Controller
{
    use PasswordValidationRules;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'ktp' => ['required', 'mimes:png,jpg,jpeg'],
            'kk' => ['required', 'mimes:png,jpg,jpeg'],
            'selfie' => ['required', 'mimes:png,jpg,jpeg'],
            'nik' => ['required', 'numeric', 'digits:16', 'exists:penduduks', 'unique:layanan_mandiris'],
            'no_keluarga' => ['required', 'numeric', 'digits:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_tlp' => ['required', 'string', 'max:12'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ], [
            'nik.exists' => 'NIK tidak terdaftar didatabase!!',
        ])->validate();

        // prepare
        $dokumen = collect();
        //get ktp 
        $ktpPath = $request->file('ktp')->store('layanan-mandiri/ktp');
        $dokumenKtp = collect(['nama', 'value']);
        $combineKtp = $dokumenKtp->combine(['ktp', $ktpPath]);
        //get kk 
        $kkPath = $request->file('kk')->store('layanan-mandiri/kk');
        $dokumenKK = collect(['nama', 'value']);
        $combineKK = $dokumenKK->combine(['kk', $kkPath]);
        //foto selfie
        $selfiePath = $request->file('selfie')->store('layanan-mandiri/selfie');
        $dokumenSelfie = collect(['nama', 'value']);
        $combineSelfie = $dokumenSelfie->combine(['selfie', $selfiePath]);
        $dokumens = $dokumen->push($combineKtp, $combineKK, $combineSelfie);


        $layananMandiri = LayananMandiri::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_keluarga' => $request->no_keluarga,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'dokumen' => $dokumens,
            'password' => Hash::make($request->password),
        ]);
        $layananMandiri->notify(new RegisterLayananMandiriEmailNotification($layananMandiri));
        return redirect()->route('layananMandiri.register')->with('success', __('Silahkan periksa email anda!'));
    }
}