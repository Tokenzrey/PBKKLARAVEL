<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Validation\ValidatesRequests;
class VendorController
{
    use ValidatesRequests;
    public function index()
    {
        $vendor = Vendor::where('aktif', '=', 'y')->get();
        return view('vendor.index', [
            'vendor' => $vendor
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
        ]);

        Vendor::where(['id' => $request->id])->first();
        Vendor::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi
        ]);
        Alert::success('Success', 'Data Ruang berhasil ditambahkan');
        return redirect()->route('vendor.index');
    }

    public function show($id)
    {
        $vendor = Vendor::all()->find($id);
        return view('vendor.show', [
            'vendor' => $vendor
        ]);
    }

    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            Alert::error('Error', 'Data Vendor tidak ditemukan');
            return redirect()->route('vendor.index');
        }

        $data_vendor = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi
        ];

        $vendor->where(['id' => $id])->update($data_vendor);
        Alert::success('Success', 'Data Vendor Berhasil Di Update');
        return redirect()->route('vendor.index');
    }

    public function destroy($id)
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            Alert::error('Error', 'Vendor Tidak Ditemukan');
            return redirect()->route('vendor.index');
        }
        $vendor->where(['id' => $id])->update(['aktif' => 't']);
        Alert::success('Success', 'Data Vendor Berhasil Dihapus');
        return redirect()->route('vendor.index');
    }
}
