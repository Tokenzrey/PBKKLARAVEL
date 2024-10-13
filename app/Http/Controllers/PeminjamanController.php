<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\User;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $keyword_search = $request->get('keyword_search');

        // Build the query to get all assets
        // $aset = Aset::join('kategori', 'kategori.id', '=', 'aset.kategori_id')
        //     ->join('ruang', 'ruang.id', '=', 'aset.ruang_id')
        //     ->leftJoin('peminjaman', function ($join) {
        //         $join->on('peminjaman.aset_id', '=', 'aset.id')
        //             ->where('peminjaman.status', '!=', 'DITERIMA');
        //     })
        //     ->where(function ($query) use ($keyword_search) {
        //         $query->where('aset.nama', 'like', '%' . strtolower($keyword_search) . '%')
        //             ->orWhere('aset.tempat', 'like', '%' . strtolower($keyword_search) . '%')
        //             ->orWhere('kategori.nama', 'like', '%' . strtolower($keyword_search) . '%')
        //             ->orWhere('ruang.nama', 'like', '%' . strtolower($keyword_search) . '%');
        //     })
        //     ->where('aset.aktif', '=', 'y')
        //     ->groupBy('aset.id') // Ensure each asset is only listed once
        //     ->orderBy('aset.id', 'asc')
        //     ->orderBy('peminjaman.created_at', 'desc')
        //     ->distinct()
        //     ->paginate(6);

        // $aset = DB::table('aset')
        //     ->join('kategori', 'kategori.id', '=', 'aset.kategori_id')
        //     ->join('ruang', 'ruang.id', '=', 'aset.ruang_id')
        //     ->leftJoin('peminjaman', 'aset.id', '=', 'peminjaman.aset_id')
        //     ->where(function($query) {
        //         $query->where('peminjaman.status', '!=', 'DITERIMA')
        //             ->orWhereNull('peminjaman.status'); // Include assets with no related peminjaman
        //     })
        //     ->select('aset.id', 'aset.nama', 'aset.tempat', 'kategori.nama as kategori_nama', 'ruang.nama as ruang_nama', 'peminjaman.status', 'peminjaman.created_at')
        //     ->get();

        $assetIdsWithPeminjaman = Peminjaman::where('status', 'DITERIMA')
                ->pluck('aset_id');

        $aset = Aset::join('kategori', 'kategori.id', '=', 'aset.kategori_id')
                ->join('ruang', 'ruang.id', '=', 'aset.ruang_id')
                ->where(function ($query) use ($keyword_search) {
                            $query->where('aset.nama', 'like', '%' . strtolower($keyword_search) . '%')
                                ->orWhere('aset.tempat', 'like', '%' . strtolower($keyword_search) . '%')
                                ->orWhere('kategori.nama', 'like', '%' . strtolower($keyword_search) . '%')
                                ->orWhere('ruang.nama', 'like', '%' . strtolower($keyword_search) . '%');
                })
                ->whereNotIn('aset.id', $assetIdsWithPeminjaman)
                ->where('aset.aktif', '=', 'y') // Include only active assets
                ->select('aset.id', 'aset.nama', 'aset.tempat', 'aset.gambar', 'kategori.nama as kategori_nama', 'ruang.nama as ruang_nama')
                ->orderBy('aset.id', 'asc')
                ->get();

        // $aset = Aset::join('kategori', 'kategori.id', '=', 'aset.kategori_id')
        //     ->join('ruang', 'ruang.id', '=', 'aset.ruang_id')
        //     ->leftJoin('peminjaman', function ($join) {
        //         $join->on('peminjaman.aset_id', '=', 'aset.id')
        //             ->where('peminjaman.status', '!=', 'DITERIMA');
        //     })
        //     ->where(function ($query) use ($keyword_search) {
        //         $query->where('aset.nama', 'like', '%' . strtolower($keyword_search) . '%')
        //             ->orWhere('aset.tempat', 'like', '%' . strtolower($keyword_search) . '%')
        //             ->orWhere('kategori.nama', 'like', '%' . strtolower($keyword_search) . '%')
        //             ->orWhere('ruang.nama', 'like', '%' . strtolower($keyword_search) . '%');
        //     })
        //     ->where('aset.aktif', '=', 'y')
        //     ->select('aset.id', 'aset.nama', 'aset.tempat', 'kategori.nama as kategori_nama', 'ruang.nama as ruang_nama', 'peminjaman.status', 'peminjaman.created_at')
        //     // ->groupBy('aset.id') // Group by asset ID to ensure unique results
        //     ->orderBy('aset.id', 'asc')
        //     ->orderBy('peminjaman.created_at', 'desc')
        //     ->distinct()
        //     ->get();

        $kategori = Kategori::where('aktif', '=', 'y')->get();
        return view('peminjaman', [
            'asets' => $aset,
            'kategori' => $kategori
        ]);
    }

    public function qrcode(Request $request)
    {
        if ($request->keyword) {
            $aset = Aset::search($request->keyword)->get();
        } else {
            $aset = Aset::where('aktif', '=', 'y')->get();
        }
        return view('peminjaman.qrcode', [
            'aset' => $aset
        ]);
    }

    public function store(Request $request)
    {
        $aset_id = $request->aset_id;
        $user = Auth::user()->id;

        $aset = Aset::find($aset_id);

        if (!$aset) {
            return back()->with('error', 'Aset tidak ditemukan!');
        }

        $peminjaman = Peminjaman::where('aset_id', $aset_id)
            ->where('status', 'DITERIMA')
            ->whereHas('aset', function ($query) {
                $query->where('aktif', 'y');
            })
            ->first();
        
        Peminjaman::create([
            'aset_id' => $aset_id,
            'user_id' => $user,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'keperluan' => $request->keperluan
        ]);

        Alert::success('Success', 'Aset berhasil diproses. Silahkan tunggu konfirmasi dari admin untuk proses selanjutnya!');
        return redirect()->route('peminjaman.index');
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::find($id);
        $aset = Aset::all();
        $ruang = Ruang::all();
        $kategori = Kategori::all();
        return view('peminjaman_data.show', [
            'peminjaman' => $peminjaman,
            'aset' => $aset,
            'kategori' => $kategori,
            'ruang' => $ruang,
            'kondisi' => ['Baik', 'Kurang Baik', 'Rusak']
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $peminjaman = Peminjaman::where(['id' => $id])->first();
        $aset_id = $request->id_aset;

        if (!$peminjaman) {
            Alert::error('Error', 'Peminjaman tidak ditemukan');
            return redirect()->route('peminjaman.index');
        }

        $peminjaman->status = $request->status;
        $peminjaman->save();

        if ($peminjaman->status == 'diterima') {
            // Hapus semua peminjaman lain dengan aset_id yang sama
            Peminjaman::where('aset_id', $aset_id)
                ->whereNotIn('status', ['DITERIMA', 'SELESAI'])
                ->update(['status' => 'DITOLAK']);
        }

        Alert::success('Success', 'Status peminjaman berhasil diperbarui!');
        return redirect()->route('peminjaman.data');
    }

    public function destroy($id)
    {
        //
    }


    public function data_peminjaman(Request $request)
    {

        $peminjaman = Peminjaman::where('status', '!=', 'SELESAI')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $user = User::where('aktif', '=', 'y')->get();
        return view('peminjaman_data.index', [
            'peminjaman' => $peminjaman,
            'user' => $user,
            'kategori' => $kategori,
            'aset' => $aset,
            'ruang' => $ruang
        ]);
    }


    public function history_data_peminjaman(Request $request)
    {
        $filter = $request->input('filter');

        $history_peminjaman = Peminjaman::where('status', '=', 'SELESAI')->get();
        $aset = Aset::where('aktif', '=', 'y')->get();
        $kategori = Kategori::where('aktif', '=', 'y')->get();
        $ruang = Ruang::where('aktif', '=', 'y')->get();
        $user = User::where('aktif', '=', 'y')->get();
        $asetSeringDipinjam = [];
        $userSeringPinjam = [];

        if ($filter == 'semua_history_aset') {
            $history_peminjaman = Peminjaman::all();
        } elseif ($filter == 'aset_sering_dipinjam') {
            $asetPeminjamanCount = Peminjaman::select('aset_id', DB::raw('count(*) as peminjaman_count'))
                ->groupBy('aset_id')
                ->orderBy('peminjaman_count', 'desc')
                ->get();

            foreach ($asetPeminjamanCount as $item) {
                $asetItem = $aset->where('id', $item->aset_id)->first();
                $asetItem->total_peminjam = $item->peminjaman_count;
                $asetSeringDipinjam[] = $asetItem;
            }
        } elseif ($filter == 'user_sering_pinjam') {
            $userPinjamCount = Peminjaman::select('user_id', DB::raw('count(*) as peminjaman_count'))
                ->groupBy('user_id')
                ->orderBy('peminjaman_count', 'desc')
                ->get();

            foreach ($userPinjamCount as $item) {
                $userItem = $user->where('id', $item->user_id)->first();
                $userItem->total_pinjam = $item->peminjaman_count;
                $userSeringPinjam[] = $userItem;
            }
        } else {
            $history_peminjaman = Peminjaman::where('status', '=', 'SELESAI')->get();
        }

        return view('peminjaman_data.history', [
            'history_peminjaman' => $history_peminjaman,
            'user' => $user,
            'kategori' => $kategori,
            'aset' => $aset,
            'ruang' => $ruang,
            'filter' => $filter,
            'userSeringPinjam' => $userSeringPinjam,
            'asetSeringDipinjam' => $asetSeringDipinjam
        ]);
    }

    public function destroy_history($id)
    {
        $peminjaman = Peminjaman::find($id);
        if (!$peminjaman) {
            Alert::error('Error', 'Data History Peminjaman Tidak Ditemukan');
            return redirect()->route('peminjaman.data');
        }
        $peminjaman->where(['id' => $id])->delete();
        Alert::success('Success', 'Data dari history peminjaman Berhasil Dihapus | Data tidak bisa Dikembalikan');
        return redirect()->route('peminjaman.data');
    }

    public function history_peminjaman_user()
    {
        if (Auth::user()->status != 'ADMIN') {
            $user_id = Auth::user()->id;
            $history_peminjaman = Peminjaman::where('user_id', '=', $user_id)->get();
            $aset = Aset::where('aktif', '=', 'y')->get();
            $kategori = Kategori::where('aktif', '=', 'y')->get();
            $ruang = Ruang::where('aktif', '=', 'y')->get();
            $user = User::where('aktif', '=', 'y')->get();
            return view('peminjaman_data.history-user', [
                'history_peminjaman' => $history_peminjaman,
                'user' => $user,
                'kategori' => $kategori,
                'aset' => $aset,
                'ruang' => $ruang
            ]);
        } else {
            return redirect()->route('peminjaman.data');
        }
    }
}
