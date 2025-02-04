<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'dosen';
    protected $fillable = [
        'dosen',
        'jabatan',
        'no_telp',
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(jadwal::class, 'id_dosen', 'id');
    }

}
