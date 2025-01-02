<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Kuis;
use App\Models\Moduls;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $kuis = Kuis::all();
        $kelas_count = $kelas->count();
        $kuis_count = $kuis->count();
        $modul = Moduls::join('kelas', 'moduls.id_kelas', '=', 'kelas.id')->join('kuis', 'moduls.id_kuis', '=', 'kuis.id')->select('moduls.*', 'kuis.nama as kuis', 'kelas.nama as kelas')->get();
        $modul_count = $modul->count();
        $user = User::all();
        $user_count = $user->count();
        return view('admin.dashboard', compact('kelas', 'kuis','kelas_count', 'kuis_count','modul_count', 'user_count', 'modul'));
    }
}
