<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus_lemawa extends Model
{
    use HasFactory;
    protected $table = 'pengurus_lemawa';
    protected $primaryKey = 'id_pengurus_lemawa';

    public function lemawa()
    {
        return $this->belongsTo(Lemawa::class, 'id_lemawa', 'id_lemawa');
    }
}
