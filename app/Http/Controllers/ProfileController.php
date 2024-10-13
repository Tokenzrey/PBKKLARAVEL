<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController
{
    public function index()
    {
        return view('user.index', [
            'users' => User::where('aktif', 'y')->get(),
            'divisi' => Divisi::where('aktif', 'y')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,jfif|max:2048',
        ]);

        $gambar = $request->file('gambar') ? $request->file('gambar')->store('public/gambar_user') : null;
        if ($gambar) {
            $gambar = str_replace('public/', '', $gambar);
        }

        User::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'status' => $request->status,
            // 'divisi_id' => $request->divisi,
            'gambar' => $gambar,
            'email' => $request->email,
            'username' => strtolower($request->username),
            'password' => Hash::make($request->password),
        ]);

        Alert::success('Success', 'User Berhasil Ditambahkan');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        return view('user.show', [
            'user' => User::findOrFail($id),
            'divisi' => Divisi::where('aktif', 'y')->get(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request, $id): RedirectResponse
{
    // Ambil user berdasarkan id
    $user = User::findOrFail($id);

    // Validasi input yang masuk
    // $data = $request->validated();

    // Cek jika name diubah, langsung assign ke variabel $data
    if ($request->filled('nama')) {
        $data['nama'] = $request->nama; // Pastikan mengambil 'name' bukan 'username'
    }

    // Cek jika email diubah, langsung assign ke variabel $data
    if ($request->filled('email')) {
        $data['email'] = $request->email;
    }

    // Cek jika jenis kelamin diubah, langsung assign ke variabel $data
    if ($request->filled('jenis_kelamin')) {
        $data['jenis_kelamin'] = $request->jenis_kelamin;
    }

    // Cek jika no_telepon diubah, langsung assign ke variabel $data
    if ($request->filled('no_telepon')) {
        $data['no_telepon'] = $request->no_telepon;
    }

    // Cek jika alamat diubah, langsung assign ke variabel $data
    if ($request->filled('alamat')) {
        $data['alamat'] = $request->alamat;
    }

    // Cek jika gambar baru diupload, jika ya, simpan dan ganti gambar lama
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($user->gambar) {
            Storage::delete('public/' . $user->gambar);
        }

        // Simpan gambar baru
        $gambarPath = $request->file('gambar')->store('gambar_user', 'public'); // Store directly in public
        $user->gambar = str_replace('public/', '', $gambarPath); // Simpan path gambar baru
    }

    // Update waktu 'updated_at' secara otomatis
    $data['updated_at'] = now();

    // Debug input sebelum update
    // dd($data);
    
    // Update user hanya dengan data yang telah diubah
    $user->update($data);

    // Kirim pesan sukses
    Alert::success('Success', 'User Berhasil Di Update!');
    return redirect()->route('profile.edit');
}


    

    public function destroy(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        Auth::logout();
        $user->update(['aktif' => 't']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Alert::success('Success', 'User Berhasil Dihapus');
        return Redirect::to('/');
    }
}
