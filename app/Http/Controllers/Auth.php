<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthUser;
use Illuminate\Support\Facades\Hash;

class Auth extends Controller
{
    public function signUp()
    {
        return view('auth.register');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function register(Request $request)
    {
        // Validasi data jika diperlukan
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
            // Masukkan field lainnya sesuai kebutuhan
        ]);

        // Kirim respons berhasil ke JavaScript
        return response()->json(['message' => 'Data berhasil disimpan']);
    }
    public function login_check(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (AuthUser::attempt($credentials)) {
            // Jika autentikasi berhasil
            return response()->json(['message' => 'Login berhasil'], 200);
        } else {
            // Jika autentikasi gagal
            return response()->json(['message' => 'Login gagal'], 401);
        }
    }
    public function logout()
    {
        AuthUser::logout();
        return redirect()->route('login');
    }
    public function profile($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profil.profil',['user'=>$user]);
    }
    public function update(Request $request ,$id)
    {
        $data = User::findOrFail($id);

        $data->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
                // Masukkan field lainnya sesuai kebutuhan
            ]
        );
        $user = User::findOrFail($id);
        return view('admin.profil.profil',['user'=>$user]);
    }
}
