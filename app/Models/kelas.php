<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class kelas extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kelas';
    protected $fillable = [
        'id',
        'kelas',
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(jadwal::class, 'id_kelas', 'id');
    }

    public function pengampuh(): HasMany
    {
        return $this->hasMany(jadwal::class, 'id_kelas', 'id');
    }
}
