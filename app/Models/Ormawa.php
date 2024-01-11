<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;
    protected $table = 'ormawa';
    protected $primaryKey = 'id_ormawa';

    public function pengurusOrmawa()
    {
        return $this->hasMany(Pengurus_ormawa::class, 'id_ormawa');
    }
}
