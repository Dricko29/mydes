<?php

namespace App\Http\Controllers\Akun;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AjukanSuratController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
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

        if ($request->ajax()) {
            $status = $request->status;
            $model = Surat::with('klasifikasiSurat')->where('layanan', 1);
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('action', function ($model) {
                    return '<a href="/user/form/surat/' . $model->id . '" class="btn btn-sm btn-success">Form</a>';
                })
                ->addColumn('info_status', function ($model) {
                    if ($model->status == 1) {
                        return '<span class="badge bg-primary">Aktif</span>';
                    } else {
                        return '<span class="badge bg-danger">Nonaktif</span>';
                    }
                })
                ->rawColumns(['action', 'info_status'])
                ->make(true);
        }
        return view('user.ajukan-surat', compact('pageConfigs'));
    }
}