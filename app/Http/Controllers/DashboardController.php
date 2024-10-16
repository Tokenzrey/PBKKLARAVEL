<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Divisi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\JadwalPemeliharaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController
{
    public function admin()
    {
        $totalPeminjaman = Peminjaman::select('status', DB::raw('count(*) as jumlah'),)->groupBy('status')->get();
        $jml_peminjaman = Peminjaman::where('aktif', '=', 'y')->count();
        $jml_aset = Aset::where('aktif', '=', 'y')->count();
        $jml_user = User::where('aktif', '=', 'y')->count();
        $jml_kategori = Kategori::where('aktif', '=', 'y')->count();
        $jml_ruang = Ruang::where('aktif', '=', 'y')->count();
        $jml_divisi = Divisi::where('aktif', '=', 'y')->count();
        $jml_jp = JadwalPemeliharaan::where('aktif', '=', 'y')->count();

        $today = date('Y-m-d');
        $alert_maintenance = JadwalPemeliharaan::where(function ($query) {
            $query->where('status', '!=', 'selesai')
                  ->where('aktif', '=', 'y');
        })->get();

        $total_jp_notif = JadwalPemeliharaan::where(function ($query) {
            $query->where('status', '!=', 'selesai')
                  ->where('aktif', '=', 'y');
        })->count();

        $history_peminjaman = Peminjaman::where('aktif', '=', 'y')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $user = User::where('aktif', '=', 'y')->get();

        $kategoriAsset_count = Kategori::withCount('aset')->get()->pluck('aset_count', 'nama')->toArray();

        $alert_maintenance_time = Aset::getMaintenanceTime($aset)->where('is_maintenance_time',true);

        if (Auth::user()->status != 'ADMIN') {
            return redirect()->route('dashboard.user');
        }

        $total_jp_notif += $alert_maintenance_time->count();
        return view('dashboard.admin', [
            'viewTotalPeminjaman'       => $totalPeminjaman,
            'jml_peminjaman'            => $jml_peminjaman,
            'jml_aset'                  => $jml_aset,
            'jml_user'                  => $jml_user,
            'jml_kategori'              => $jml_kategori,
            'jml_ruang'                 => $jml_ruang,
            'jml_divisi'                => $jml_divisi,
            'jml_jp'                    => $jml_jp,
            'today'                     => $today,
            'alert_maintenance'         => $alert_maintenance,
            'total_jp_notif'            => $total_jp_notif,
            'history_peminjaman'        => $history_peminjaman,
            'user'                      => $user,
            'kategori'                  => $kategori,
            'aset'                      => $aset,
            'ruang'                     => $ruang,
            'kategoriAsset_count'       => $kategoriAsset_count,
            'alert_maintenance_time'    => $alert_maintenance_time
        ]);
    }

    public function user()
    {
        $user_id = Auth::user()->id;
        $aset = Aset::join('kategori', 'kategori.id', '=', 'aset.id')
            ->join('peminjaman', 'peminjaman.id', '=', 'aset.id')
            ->select(
                'aset.*',
                'kategori.nama as nama_kategori',
                'peminjaman.id as id_peminjaman',
                'peminjaman.tanggal_pinjam',
                'peminjaman.keperluan',
                'peminjaman.status as status_peminjaman'
            )
            ->where(['aset.aktif' => 'y', 'user_id' => $user_id])->get();

        if (Auth::user()->status == 'ADMIN') {
            return redirect()->route('dashboard.admin');
        }

        return view('dashboard.user', [
            'aset' => $aset
        ]);
    }

}
