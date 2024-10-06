<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Vendor;
use App\Models\JenisPemeliharaan;
use App\Models\Peminjaman;

class ReportController
{
    public function index()
    {
        return view('report.index');
    }

    public function report_aset()
    {
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $vendor = Vendor::where('aktif', '=', 'y')->get();
        return view('report.aset', [
            'aset' => $aset,
            'kategori' => $kategori,
            'ruang' => $ruang,
            'jenis_pemeliharaan' => $jenis_pemeliharaan,
            'vendor' => $vendor,
            'kondisi' => ['Baik', 'Kurang Baik', 'Rusak']
        ]);
    }

    public function report_peminjaman()
    {
        $peminjaman = Peminjaman::where('aktif', 'y')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $jenis_pemeliharaan = JenisPemeliharaan::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $vendor = Vendor::where('aktif', '=', 'y')->get();
        return view('report.peminjaman', [
            'peminjaman' => $peminjaman,
            'aset' => $aset,
            'kategori' => $kategori,
            'ruang' => $ruang,
            'jenis_pemeliharaan' => $jenis_pemeliharaan,
            'vendor' => $vendor,
            'kondisi' => ['Baik', 'Kurang Baik', 'Rusak']
        ]);
    }

    public function report_history_peminjaman()
    {
        $history_peminjaman = Peminjaman::where('status', '=', 'SELESAI')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $user = User::where('aktif', '=', 'y')->get();
        return view('report.history_peminjaman', [
            'history_peminjaman' => $history_peminjaman,
            'user' => $user,
            'kategori' => $kategori,
            'aset' => $aset,
            'ruang' => $ruang
        ]);
    }

}
