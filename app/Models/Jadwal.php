<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'jadwal';
    protected $fillable = [
        'id_dosen',
        'id_mk',
        'id_kelas',
        'id_ruang',
        'id_semester',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function dosen():BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function mataKuliah():BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'id_mk', 'id');
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function ruang(): BelongsTo
    {
        return $this->belongsTo(ruang::class, 'id_ruang', 'id');
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'id_semester','id');
    }

    public function getIsConditionAttribute($value)
    {
        if ($value === 'senin') {
            return 'Senin';
        } elseif ($value === 'selasa') {
            return 'Selasa';
        } elseif ($value === 'rabu') {
            return 'Rabu';
        } elseif ($value === 'kamis') {
            return 'Kamis';
        } else {
            return 'Jumat'; 
        }
    }
}
