<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttrPendidikanKeluarga extends Model
{
    use HasFactory;
    protected $fillable = ['nama'];

    public function penduduk() : HasMany
    {
        return $this->hasMany(Penduduk::class);
    }
}