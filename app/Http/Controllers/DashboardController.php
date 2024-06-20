<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $mahasiswaprodi = DB::select(" SELECT prodis.nama, COUNT(*) as jumlah 
            FROM mahasiswas
            JOIN prodis ON mahasiswas.prodi_id = prodis.id
            GROUP BY prodis.nama ");
        return view('dashboard')->with('mahasiswaprodi', $mahasiswaprodi);
    }
}
