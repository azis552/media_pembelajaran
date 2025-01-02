<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moduls extends Model
{
    use HasFactory;

    protected $fillable = ['document', 'id_kelas', 'id_kuis'];
}
