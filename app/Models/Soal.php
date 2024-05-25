<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = ['id_kuis','soal','gambar','jawaban1','jawaban2','jawaban3','jawaban4','jawaban5','jawaban_benar'];
}
