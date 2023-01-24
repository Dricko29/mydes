<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttrKelamin extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'slug'];

    public function penduduk(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}