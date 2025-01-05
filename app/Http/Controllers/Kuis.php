<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Kuis as ModelsKuis;
use App\Models\Play;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Kuis extends Controller
{
    public function index() {}
    public function play($id)
    {
        $data = Soal::where('id_kuis', '=', $id)->get();
        $waktu = ModelsKuis::find($id)->waktu;
        $waktu = $waktu * 60;
        return view('admin.kuis.play', ['data' => $data, 'id_kelas' => $id, 'waktu' => $waktu]);
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

        // Mengambil semua jawaban pengguna berdasarkan ID kuis
        $jawabanPengguna = Jawaban::join('soals', 'soals.id', '=', 'jawabans.id_soal')
            ->where('jawabans.id_user', '=', $id_user)
            ->select('soals.id_kuis', 'jawabans.jawaban', 'soals.jawaban_benar', 'jawabans.created_at')
            ->get();

        // Menghitung skor untuk setiap kuis berdasarkan waktu
        $scores = []; // Array untuk menyimpan skor untuk setiap kuis
        $sessionScores = []; // Array untuk menyimpan skor per sesi
        $totalSoal = []; // Array untuk menyimpan total soal per ID kuis

        foreach ($jawabanPengguna as $jawaban) {
            $id_kuis = $jawaban->id_kuis;
            $sessionKey = $id_kuis . '|' . $jawaban->created_at; // Buat key unik berdasarkan ID kuis dan waktu

            // Inisialisasi skor untuk sesi ini jika belum ada
            if (!isset($sessionScores[$sessionKey])) {
                $sessionScores[$sessionKey] = 0;
            }

            // Bandingkan jawaban pengguna dengan jawaban yang benar
            if ($jawaban->jawaban === $jawaban->jawaban_benar) {
                $sessionScores[$sessionKey]++; // Tambahkan skor jika jawaban benar
            }

            // Hitung total soal per ID kuis
            if (!isset($totalSoal[$id_kuis])) {
                $totalSoal[$id_kuis] = Soal::where('id_kuis', $id_kuis)->count(); // Hitung total soal
            }
        }

        // Mengelompokkan skor berdasarkan ID kuis
        foreach ($sessionScores as $sessionKey => $score) {
            list($id_kuis, $createdAt) = explode('|', $sessionKey);

            // Hitung nilai berdasarkan jumlah soal
            $nilai = ($score / $totalSoal[$id_kuis]) * 100; // Menghitung nilai akhir

            // Simpan skor ke dalam array dengan ID kuis dan waktu sebagai kunci
            if (!isset($scores[$id_kuis])) {
                $scores[$id_kuis] = []; // Inisialisasi jika belum ada
            }

            $scores[$id_kuis][] = [
                'nama_kuis' => ModelsKuis::find($id_kuis)->nama,
                'id_kuis' => $id_kuis,
                'nilai' => number_format($nilai, 2), // Format angka untuk tampilan
                'tgl' => $createdAt
            ];
        }

        $data = array_values($scores);
        return view('admin.kuis.history', ['data' => $data]);
    }

    public function history_siswa()
    {
        // Mengambil semua jawaban pengguna berdasarkan ID kuis
        $jawabanPengguna = Jawaban::join('soals', 'soals.id', '=', 'jawabans.id_soal')
            ->select('soals.id_kuis', 'jawabans.jawaban', 'soals.jawaban_benar', 'jawabans.created_at', 'jawabans.id_user')
            ->get();


        // Inisialisasi variabel untuk menyimpan skor, sesi, total soal, dan pengguna
        $scores = [];
        $sessionScores = [];
        $totalSoal = [];
        $users = []; // Ubah nama variabel untuk lebih jelas

        foreach ($jawabanPengguna as $jawaban) {
            $id_kuis = $jawaban->id_kuis;
            $sessionKey = $id_kuis . '|' . $jawaban->created_at; // Buat key unik berdasarkan ID kuis dan waktu

            // Inisialisasi skor untuk sesi ini jika belum ada
            if (!isset($sessionScores[$sessionKey])) {
                $sessionScores[$sessionKey] = 0;
            }

            // Bandingkan jawaban pengguna dengan jawaban yang benar
            if ($jawaban->jawaban === $jawaban->jawaban_benar) {
                $sessionScores[$sessionKey]++; // Tambahkan skor jika jawaban benar
            }

            // Hitung total soal per ID kuis
            if (!isset($totalSoal[$id_kuis])) {
                $totalSoal[$id_kuis] = Soal::where('id_kuis', $id_kuis)->count(); // Hitung total soal
            }

            // Ambil nama pengguna berdasarkan ID pengguna
            if (!isset($users[$jawaban->id_user])) {
                $user = User::find($jawaban->id_user);
                if ($user) {
                    $users[$jawaban->id_user] = $user->name; // Simpan nama pengguna berdasarkan ID pengguna
                } else {
                    $users[$jawaban->id_user] = 'Unknown'; // Jika tidak ditemukan, set ke 'Unknown'
                }
            }
        }


        // Mengelompokkan skor berdasarkan ID kuis
        foreach ($sessionScores as $sessionKey => $score) {
            list($id_kuis, $createdAt) = explode('|', $sessionKey);

            // Jika kuis belum dilaksanakan (tidak ada soal atau skor 0), lewati proses
            if (!isset($totalSoal[$id_kuis]) || $score == 0) {
                $scores[$id_kuis] = [
                    [
                        'nama_kuis' => ModelsKuis::find($id_kuis)->nama ?? 'Nama Kuis Tidak Ditemukan',
                        'id_kuis' => $id_kuis,
                        'nilai' => null,
                        'tgl' => null,
                        'user' => null // Kembalian kosong
                    ]
                ];
                continue; // Lewati ke iterasi berikutnya
            }

            // Hitung nilai berdasarkan jumlah soal
            $nilai = ($score / $totalSoal[$id_kuis]) * 100; // Menghitung nilai akhir

            // Simpan skor ke dalam array dengan ID kuis dan waktu sebagai kunci
            if (!isset($scores[$id_kuis])) {
                $scores[$id_kuis] = []; // Inisialisasi jika belum ada
            }

            // Ambil nama pengguna yang sesuai dengan ID pengguna dari jawaban
            $userNames = [];
            foreach ($jawabanPengguna as $jawabanItem) {
                if ($jawabanItem->id_kuis == $id_kuis && $jawabanItem->created_at == $createdAt) {
                    $userNames[] = $users[$jawabanItem->id_user] ?? 'Pengguna Tidak Diketahui'; // Ambil nama pengguna
                }
            }

            // Gabungkan nama pengguna yang unik
            $userNamesUnique = array_unique($userNames);
            $userNamesString = implode(', ', $userNamesUnique);

            $scores[$id_kuis][] = [
                'nama_kuis' => ModelsKuis::find($id_kuis)->nama ?? 'Nama Kuis Tidak Ditemukan',
                'id_kuis' => $id_kuis,
                'nilai' => number_format($nilai, 2), // Format angka untuk tampilan
                'tgl' => $createdAt,
                'user' => $userNamesString // Gabungkan nama pengguna
            ];
        }


        $data = array_values($scores);
        return view('admin.kuis.history_siswa', ['data' => $data]);
    }
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $value) {

            // Cek apakah key-nya mulai dengan 'id_soal_'
            if (strpos($key, 'id_soal_') === 0) {
                // Ambil indeks dari id_soal_*
                $index = str_replace('id_soal_', '', $key);

                // Ambil data berdasarkan indeks
                $id_soal = $request->input('id_soal_' . $index);
                $jawaban = $request->input('jawaban_' . $index) ?? "kosong";
                $kesulitan = $request->input('kesulitan_' . $index) ?? "tidak dipilih";

                // Buat data yang akan disimpan
                $data = [
                    'id_soal' => $id_soal,
                    'jawaban' => $jawaban,
                    'status' => $kesulitan,
                    'id_user' => Auth::user()->id,
                ];
                // Simpan ke database
                $simpan = Jawaban::create($data);
            }
        }


        $id_user = Auth::user()->id;

        // Mengambil semua jawaban pengguna berdasarkan ID kuis
        $jawabanPengguna = Jawaban::join('soals', 'soals.id', '=', 'jawabans.id_soal')
            ->where('jawabans.id_user', '=', $id_user)
            ->select('soals.id_kuis', 'jawabans.jawaban', 'soals.jawaban_benar', 'jawabans.created_at')
            ->get();

        // Menghitung skor untuk setiap kuis berdasarkan waktu
        $scores = []; // Array untuk menyimpan skor untuk setiap kuis
        $sessionScores = []; // Array untuk menyimpan skor per sesi
        $totalSoal = []; // Array untuk menyimpan total soal per ID kuis

        foreach ($jawabanPengguna as $jawaban) {
            $id_kuis = $jawaban->id_kuis;
            $sessionKey = $id_kuis . '|' . $jawaban->created_at; // Buat key unik berdasarkan ID kuis dan waktu

            // Inisialisasi skor untuk sesi ini jika belum ada
            if (!isset($sessionScores[$sessionKey])) {
                $sessionScores[$sessionKey] = 0;
            }

            // Bandingkan jawaban pengguna dengan jawaban yang benar
            if ($jawaban->jawaban === $jawaban->jawaban_benar) {
                $sessionScores[$sessionKey]++; // Tambahkan skor jika jawaban benar
            }

            // Hitung total soal per ID kuis
            if (!isset($totalSoal[$id_kuis])) {
                $totalSoal[$id_kuis] = Soal::where('id_kuis', $id_kuis)->count(); // Hitung total soal
            }
        }

        // Mengelompokkan skor berdasarkan ID kuis
        foreach ($sessionScores as $sessionKey => $score) {
            list($id_kuis, $createdAt) = explode('|', $sessionKey);

            // Hitung nilai berdasarkan jumlah soal
            $nilai = ($score / $totalSoal[$id_kuis]) * 100; // Menghitung nilai akhir

            // Simpan skor ke dalam array dengan ID kuis dan waktu sebagai kunci
            if (!isset($scores[$id_kuis])) {
                $scores[$id_kuis] = []; // Inisialisasi jika belum ada
            }

            $scores[$id_kuis][] = [
                'nama_kuis' => ModelsKuis::find($id_kuis)->nama,
                'id_kuis' => $id_kuis,
                'nilai' => number_format($nilai, 2), // Format angka untuk tampilan
                'tgl' => $createdAt
            ];
        }

        $data = array_values($scores);
        return view('admin.kuis.history', ['data' => $data]);
    }

    public function history_detail($id, $id2)
    {
        $data = Jawaban::join('soals', 'id_soal', '=', 'soals.id')->where('id_user', '=', Auth::user()->id)
            ->where('soals.id_kuis', '=', $id)
            ->where('jawabans.created_at', '=', $id2)
            ->get();
        return view('admin.kuis.history_detail', ['data' => $data]);
    }
}
