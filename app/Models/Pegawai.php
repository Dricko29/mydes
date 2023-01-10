<?php

namespace App\Models;


use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;
    use Userstamps;
    protected $guarded= ['id'];

    public function attrKelamin() : BelongsTo
    {
        return $this->belongsTo(AttrKelamin::class);
    }

    public function jabatan() : BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }
    
    public function attrPendidikanKeluarga() : BelongsTo
    {
        return $this->belongsTo(AttrPendidikanKeluarga::class);
    }
    
    public function attrAgama() : BelongsTo
    {
        return $this->belongsTo(AttrAgama::class);
    }
}