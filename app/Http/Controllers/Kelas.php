<?php

namespace App\Http\Controllers;

use App\Models\DetailKelas;
use App\Models\Kelas as ModelsKelas;
use App\Models\Kuis;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\IsEmpty;

class Kelas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $data = DB::table('kelas')
            ->join('detail_kelas', 'kelas.id', '=', 'detail_kelas.id_kelas')
            ->select('kelas.nama as kelas', 'kelas.id as id', 'hak_akses', 'enrol')
            ->where('detail_kelas.id_user','=',$id_user)
            ->get();
        return view('admin.kelas.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = $request->validate([
            'nama' => 'required'
        ]);

        $kelas_id = ModelsKelas::create($credential);
        $randomString = Str::random(5);
        $data = [
            'id_kelas' => $kelas_id->id,
            'id_user' => Auth::user()->id,
            'hak_akses' => 'teacher',
            'enrol' => $randomString
        ];

        DetailKelas::create($data);

        return response()->json(['message' => 'Data berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = ModelsKelas::findOrFail($id);

        $credential = $request->validate([
            'nama' => 'required'
        ]);

        $data->update($credential);
        return response()->json(['message' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_kelas = ModelsKelas::findOrFail($id);

        $data_detail_kelas = DetailKelas::where('id_kelas', '=', $id);
        if ($data_detail_kelas->delete() == 1 && $data_kelas->delete()) {
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Data gagal dihapus'], 500);
        }
    }
    public function kelola($id)
    {
        $kelas = ModelsKelas::findOrFail($id);
        $kuis = Kuis::where('id_kelas', '=', $id)->get();
        $akses = DetailKelas::where('id_kelas','=',$id)->where('id_user','=', Auth::user()->id)->get();
        foreach($akses as $i)
        {
            $akses = $i->hak_akses;
        }
        return view('admin.kelas.kelola', ['kelas' => $kelas, 'kuis' => $kuis,'hak_akses' => $akses]);
    }
    public function simpan_kuis(Request $request)
    {
        // Validasi input
        $validator = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_kelas' => 'required'
        ]);
        // Simpan gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('public/images_kuis', $nama_gambar); // Simpan gambar ke dalam direktori 'storage/app/public/images' dengan nama yang ditentukan
            $validator['gambar'] = $nama_gambar; // Simpan nama gambar ke dalam array validator
        }
        // Simpan data
        $data = Kuis::create($validator);

        return response()->json(['success' => true]);
    }
    public function update_kuis(Request $request, $id)
    {
        $validator = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'kategori' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $kuis = Kuis::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('public/images_kuis', $nama_gambar); // Simpan gambar ke dalam direktori 'storage/app/public/images' dengan nama yang ditentukan
            $validator['gambar'] = $nama_gambar; // Simpan nama gambar ke dalam array validator
        }
        if ($kuis->update($validator)) {
            return response()->json(['message' => 'Data berhasil diubah'], 200);
        } else {
            return response()->json(['message' => 'Data gagal diubah'], 500);
        }
    }
    public function delete_kuis($id)
    {
        $data_kuis = Kuis::findOrFail($id);
            if ($data_kuis->delete() ) {
                return response()->json(['message' => 'Data berhasil dihapus'], 200);
            } else {
                return response()->json(['message' => 'Data Gagal Dihapus'], 500);
            }
    }
    public function kuis_soal($id)
    {
        $kuis = Kuis::findOrFail($id);
        $soal = Soal::where('id_kuis','=',$id)->get();

        return view('admin.kelas.soal_kuis',['kuis'=>$kuis,'soal'=>$soal]);
    }
    public function tambah_soal(Request $request)
    {
        // Validasi input
        $validator = $request->validate([
            'soal' => 'required',
            'id_kuis' => 'required',
            'jawaban1' => 'required',
            'jawaban2' => 'required',
            'jawaban3' => 'required',
            'jawaban4' => 'required',
            'jawaban5' => 'required',
            'jawaban_benar' => 'required',
        ]);
        // Simpan gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('public/images_kuis', $nama_gambar); // Simpan gambar ke dalam direktori 'storage/app/public/images' dengan nama yang ditentukan
            $validator['gambar'] = $nama_gambar; // Simpan nama gambar ke dalam array validator
        }
        // Simpan data
        $data = Soal::create($validator);

        return response()->json(['success' => true]);
    }
    public function update_soal(Request $request, $id)
    {
        $validator = $request->validate([
            'soal' => 'required',
            'id_kuis' => 'required',
            'jawaban1' => 'required',
            'jawaban2' => 'required',
            'jawaban3' => 'required',
            'jawaban4' => 'required',
            'jawaban5' => 'required',
            'jawaban_benar' => 'required',
        ]);
        $soal = Soal::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '.' . $gambar->getClientOriginalExtension();
            $path = $gambar->storeAs('public/images_kuis', $nama_gambar); // Simpan gambar ke dalam direktori 'storage/app/public/images' dengan nama yang ditentukan
            $validator['gambar'] = $nama_gambar; // Simpan nama gambar ke dalam array validator
        }
        if ($soal->update($validator)) {
            return response()->json(['message' => 'Data berhasil diubah'], 200);
        } else {
            return response()->json(['message' => 'Data gagal diubah'], 500);
        }
    }
    public function join_kelas(Request $request)
    {
        $validator = $request->validate([
            'enrol' => 'required',
        ]);
        $kelas = DetailKelas::where('enrol','=',$request->input('enrol'))->get();
        foreach($kelas as $i){
            $id_kelas = $i->id_kelas;
        }
        $id_user = Auth::user()->id;
        $hak_akses = 'student';
        $validator['id_user'] = $id_user;
        $validator['id_kelas'] = $id_kelas;
        $validator['hak_akses'] = $hak_akses;

        $detail_kelas = DetailKelas::create($validator);

        return response()->json(['success' => true]);
    }
}
