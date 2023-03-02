<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'jurusan';

    protected $with = ['fakultas'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
