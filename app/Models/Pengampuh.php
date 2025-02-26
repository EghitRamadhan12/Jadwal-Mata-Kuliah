<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengampuh extends Model
{
    protected $table = 'pengampuh';
    protected $fillable = [
        'id_dosen',
        'id_mk',
        'id_kelas'
    ];

    public function dosen():BelongsTo 
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function mata_kuliah():BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'id_mk');
    }

    public function kelas() : BelongsTo
    {
        return $this->belongsTo(kelas::class, 'id_kelas');
    }
}
