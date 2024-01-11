<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'judul_berita',
        'slug',
        'id_kategori',
        'isi_berita',
        'gambar'
    ];

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
