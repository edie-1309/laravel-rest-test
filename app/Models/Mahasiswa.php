<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'mahasiswa';

    protected $with = ['jurusan'];

    public function scopeFilter(Builder $query, $keyword): void
    {
        $query->where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('nim', 'like', '%' . $keyword . '%')
                ->orWhere('kelas', 'like', '%' . $keyword . '%')
                ->orWhereHas('jurusan', function ($query) use ($keyword) {
                    $query->where('jurusan', 'like', '%' . $keyword . '%');
                });
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
