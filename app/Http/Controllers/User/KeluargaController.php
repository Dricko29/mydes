<?php

namespace App\Http\Controllers\User;

use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use App\Models\LayananMandiri;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeluargaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        // $pendudukLogin = Penduduk::where('user_id', $user->id)->firstOrFail();
        $layanan = LayananMandiri::where('user_id', $user->id)->first();
        $pendudukUser = Penduduk::find($layanan->penduduk_id); 
        $keluargaLogin = Keluarga::where('id', $pendudukUser->keluarga_id)->firstOrFail();

        $pageConfigs = [
            'mainLayoutType' => 'horizontal', // Options[String]: vertical(default), horizontal
            'theme' => 'light', // options[String]: 'light'(default), 'dark', 'bordered', 'semi-dark'
            'sidebarCollapsed' => false, // options[Boolean]: true, false(default) (warning:this option only applies to the vertical theme.)
            'navbarColor' => '', // options[String]: bg-primary, bg-info, bg-warning, bg-success, bg-danger, bg-dark (default: '' for #fff)
            'horizontalMenuType' => 'floating', // options[String]: floating(default) / static /sticky (Warning:this option only applies to the Horizontal theme.)
            'verticalMenuNavbarType' => 'floating', // options[String]: floating(default) / static / sticky / hidden (Warning:this option only applies to the vertical theme)
            'footerType' => 'static', // options[String]: static(default) / sticky / hidden
            'layoutWidth' => 'boxed', // options[String]: full / boxed(default),
            'showMenu' => true, // options[Boolean]: true(default), false //show / hide main menu (Warning: if set to false it will hide the main menu)
            'bodyClass' => '', // add custom class
            'pageHeader' => false, // options[Boolean]: true(default), false (Page Header for Breadcrumbs)
            'contentLayout' => 'default', // options[String]: default, content-left-sidebar, content-right-sidebar, content-detached-left-sidebar, content-detached-right-sidebar (warning:use this option if your whole project with sidenav Otherwise override this option as page level )
            'defaultLanguage' => 'id',    //en(default)/de/pt/fr here are four optional language provided in theme
            'blankPage' => false, // options[Boolean]: true, false(default) (warning:only make true if your whole project without navabr and sidebar otherwise override option page wise)
            'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'), // Options[String]: ltr(default), rtl
        ];
        $penduduk = Penduduk::where('keluarga_id', $keluargaLogin->id)->where('attr_hubungan_id', 1)->first();
        $keluarga =  $keluargaLogin->load(['penduduks' => function ($query) {
            $query->orderBy('attr_hubungan_id', 'asc');
        }]);
        return view('user.kartu', compact(
            'pageConfigs',
            'keluarga',
            'penduduk'
        ));
    }
}