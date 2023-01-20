<?php

namespace App\Http\Controllers;

use App\Models\RukunTetangga;
use App\Models\RukunWarga;
use Illuminate\Http\Request;

class DropdownController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|petugas|kades']);
    }
    public function fetchRw(Request $request)
    {
        $data['rw'] = RukunWarga::where("dusuns_id", $request->dusuns_id)
            ->get(["nama_rw", "id"]);

        return response()->json($data);
    }
    public function fetchRt(Request $request)
    {
        $data['rt'] = RukunTetangga::where("rukun_wargas_id", $request->rukun_wargas_id)
            ->get(["nama_rt", "id"]);

        return response()->json($data);
    }
}