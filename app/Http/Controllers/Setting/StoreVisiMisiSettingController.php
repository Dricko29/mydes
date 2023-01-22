<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreVisiMisiSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->except('_token');
        $misi = collect();
        foreach($request->misi as $item){
            
            $misi->push($item);
        }
        Settings()->group('desa')->set([
            'misi'=>$misi,
            'visi' => $request->visi
        ]);
        return redirect()->back()->with('success', __('Data Created Successfully!'));
    }
}