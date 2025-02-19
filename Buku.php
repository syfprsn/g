<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id'; // Jika primary key berbeda, ubah sesuai kebutuhan
    public $timestamps = true; // Set ke false jika tabel tidak memiliki created_at dan updated_at

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'keterangan',
    ];
}
