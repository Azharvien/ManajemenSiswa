<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    //cari ke table siswas
    //karena by default jika table misal namanya siswa maka Eloquent akan mencari ke tabel siswas
    protected $fillable = ['nama', 'tanggal_lahir', 'jurusan' , 'nilai','mentor_id'];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
