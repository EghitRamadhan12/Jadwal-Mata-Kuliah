<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\kelas;
use App\Models\MataKuliah;
use App\Models\prodi;
use App\Models\ruang;
use App\Traits\HttpResponseTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use HttpResponseTrait;

    public function countJadwal() {
        $totalDosen = Dosen::count();
        $totalKelas = kelas::count();
        $totalRuang = ruang::count();
        $totalProdi = prodi::count();
        $totalMataKuliah = MataKuliah::count();

        return response()->json([
            'dosen' => $totalDosen ?? 0,
            'kelas' => $totalKelas ?? 0,
            'ruang' => $totalRuang ?? 0,
            'prodi' => $totalProdi ?? 0,
            'matakuliah' => $totalMataKuliah ?? 0
        ]);
    }
}
