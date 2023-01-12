<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvAsal extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function inventarisKonstruksiBerjalans() : HasMany
    {
        return $this->hasMany(InventarisKonstruksiBerjalan::class, 'asal_id');
    }

    public function inventarisTanahs() : HasMany
    {
        return $this->hasMany(InventarisTanah::class, 'asal_id');
    }

    public function inventarisAssetTetaps() : HasMany
    {
        return $this->hasMany(InventarisAssetTetap::class, 'asal_id');
    }

    public function inventarisBangunans() : HasMany
    {
        return $this->hasMany(InventarisBangunan::class, 'asal_id');
    }

    public function inventarisPeralatans() : HasMany
    {
        return $this->hasMany(InventarisPeralatan::class, 'asal_id');
    }
}