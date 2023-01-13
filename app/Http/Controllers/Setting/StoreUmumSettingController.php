<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreUmumSettingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->except('_token');
        Settings()->group('umum')->set($data);

        if ($request->file('app_logo')) {
            $path = $request->file('app_logo')->store('aplikasi/logo');
            Settings()->group('umum')->set('app_logo', $path);
        }
        if ($request->file('app_banner')) {
            $path = $request->file('app_banner')->store('aplikasi/banner');
            Settings()->group('umum')->set('app_banner', $path);
        }
        return redirect()->back()->with('success', __('Data Created Successfully!'));
    }
}