<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';

    protected $fillable = [
        'nama', 'instansi', 'no_telp', 'acara', 'dari_tanggal', 'sampai_tanggal', 'waktu', 'surat_permohonan', 'ktp', 'disetujui',
    ];
}
