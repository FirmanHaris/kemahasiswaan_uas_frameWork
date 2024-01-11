<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus_ormawa extends Model
{
    use HasFactory;
    protected $table = "pengurus_ormawa";
    protected $primaryKey = "id_pengurus";

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'id_ormawa', 'id_ormawa');
    }
}
