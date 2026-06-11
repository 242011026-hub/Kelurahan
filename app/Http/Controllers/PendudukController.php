<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class PendudukController extends Controller
{
    public function dataPenduduk(){
        $warga = Penduduk::all();

        return view('penduduk', compact('warga'));
    }

    public function daftarSurat() {
        // Eager Loading relasi penduduk untuk menghemat query
        $semuaSurat = Surat::with('penduduk')->get();
        return view('surat', compact('semuaSurat'));
    }

}
