<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ruang extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'ruang';
    protected $fillable = [
        'id',
        'ruang',
    ];

    public function jadwal(): HasMany
    {
        return $this->hasMany(jadwal::class, 'id_ruang', 'id');
    }
}
