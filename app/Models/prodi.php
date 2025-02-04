<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class prodi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'prodi';
    protected $fillable = [
        'id',
        'nm_prodi',
    ];
    
    public function matakuliah(): HasMany
    {
        return $this->hasMany(MataKuliah::class, 'id_prodi', 'id');
    }

}
