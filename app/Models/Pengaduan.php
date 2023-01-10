<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengaduan extends Model
{
    use HasFactory;
    use Userstamps;
    protected $guarded = ['id'];

    public function TanggapanPengaduan() : HasMany
    {
        return $this->hasMany(TanggapanPengaduan::class);
    }
}