<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'mata_kuliah';
    protected $fillable = [
        'id',
        'id_prodi',
        'mk',
        'sks',
    ];
    
    public function prodi(): BelongsTo
    {
        return $this->belongsTo(prodi::class, 'id_prodi', 'id');
    }

    public function jadwal(): HasMany
    {
        return $this->hasMany(jadwal::class, 'id_mk', 'id');
    }
}
