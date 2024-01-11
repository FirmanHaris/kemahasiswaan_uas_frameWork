<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lemawa extends Model
{
    use HasFactory;
    protected $table = 'lemawa';
    protected $primaryKey = 'id_lemawa';

    public function pengurusLemawa()
    {
        return $this->hasMany(Pengurus_lemawa::class, 'id_lemawa');
    }
}
