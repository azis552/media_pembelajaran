<?php

namespace App\Http\Controllers;

use App\Models\Play;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Kuis extends Controller
{
    public function index()
    {

    }
    public function play($id)
    {
        $data = Soal::where('id_kuis','=',$id)->get();
        return view('admin.kuis.play',['data' => $data , 'id_kelas' => $id]);
    }

    public function simpan_score(Request $request)
    {
        $validator = $request->validate([
            'id_user' => 'required',
            'id_kuis' => 'required',
            'score' => 'required'
        ]);

        $simpan = Play::create($validator);
        return redirect('kuis/history');
    }

    public function history()
    {
        $id_user = Auth::user()->id;
        $data = DB::table('plays')
            ->join('kuis', 'id_kuis', '=', 'kuis.id')
            ->join('users', 'id_user', '=', 'users.id')
            ->select('kuis.nama as kuis', 'users.name', 'score')
            ->where('plays.id_user','=',$id_user)
            ->get();
        return view('admin.kuis.history',['data' => $data]);
    }
}
