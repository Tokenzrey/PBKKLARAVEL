<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Validation\ValidatesRequests;
class RuangController
{
    use ValidatesRequests;
    public function index()
    {
        $ruang = Ruang::where('aktif', 'y')->get();
        return view('ruang.index', compact('ruang'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
        ]);

        Ruang::create($request->only(['nama', 'deskripsi']));
        Alert::success('Success', 'Data Lokasi berhasil ditambahkan');
        return redirect()->route('ruang.index');
    }

    public function show($id)
    {
        $ruang = Ruang::all()->find($id);
        return view('ruang.show', [
            'ruang' => $ruang
        ]);
    }

    public function update(Request $request, $id)
    {
        $ruang = Ruang::find($id);
        if (!$ruang) {
            Alert::error('Error', 'Data Lokasi tidak ditemukan');
            return redirect()->route('ruang.index');
        }

        $data_ruang = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi
        ];

        $ruang->where(['id' => $id])->update($data_ruang);
        Alert::success('Success', 'Data Lokasi Berhasil Di Update');
        return redirect()->route('ruang.index');
    }

    public function destroy($id)
    {
        $ruang = Ruang::find($id);
        if (!$ruang) {
            Alert::error('Error', 'Lokasi Tidak Ditemukan');
            return redirect()->route('ruang.index');
        }
        $ruang->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Lokasi Berhasil dihapus');
        return redirect()->route('ruang.index');
    }
}
