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
            'divisi_id' => $request->divisi,
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

    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $gambar = $request->file('gambar') ? $request->file('gambar')->store('public/gambar_user') : null;
        if ($gambar) {
            $gambar = str_replace('public/', '', $gambar);
        }

        $data = $request->validated() + ['updated_at' => now()];
        $data['username'] = strtolower($request->username);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($gambar) {
            $data['gambar'] = $gambar;
        }

        $user->update($data);

        Alert::success('Success', 'User Berhasil Di Update!');
        return redirect()->route('user.index');
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
