<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    use HasFactory;

    protected $table = 'kelass';
    
    protected $fillable = ['nama_peserta', 'email', 'nama_kursus', 'kategori_kursus', 'tanggal_mulai', 'tanggal_selesai', 'status_pendaftaran'];
    
    use SoftDeletes;
}
