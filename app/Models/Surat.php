<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Wildside\Userstamps\Userstamps;

class Surat extends Model
{
    use HasFactory;
    use Userstamps;
    protected $guarded = ['id'];

    public function syaratSurats() : BelongsToMany
    {
        return $this->belongsToMany(SyaratSurat::class,'surat_syarats','surat_id', 'syarat_surat_id');
    }
}