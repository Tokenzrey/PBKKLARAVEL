<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'], // Validasi untuk jenis kelamin
            'no_telepon' => ['required', 'digits_between:10,15'], // Validasi untuk no telepon
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $gambarPath = '/gambar_user/user.png';
    
        $user = User::create([
            'nama' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'alamat' => "Indonesia", // Bisa juga tambahkan input untuk alamat jika ingin
            'status' => "USER",
            'gambar' => $gambarPath, // Bisa juga tambahkan input untuk upload gambar
            'email' => $request->email,
            'username' => strtolower($request->name), // Atur username dari nama, bisa disesuaikan
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect(route('dashboard'));
    }
    
}
