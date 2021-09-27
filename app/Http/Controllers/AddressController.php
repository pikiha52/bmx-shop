<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function fetchKab($provinsi_id)
    {
        $data = Kabupaten::where('id_prov', $provinsi_id)->get();
        return $data;
    }

    public function fetchKec($kabupaten_id)
    {
        $data = Kecamatan::where('id_kab', $kabupaten_id)->get();
        return $data;
    }
}
