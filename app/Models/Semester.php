<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'semester';
    protected $fillable = [
        'id',
        'semester',
        'tgl_mulai',
        'tgl_selesai',
    ];

    public function jadwal() : HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_semester', 'id');
    }
}
