<?php

namespace App\Models;


use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
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

    protected $appends = [
        'foto_url',
    ];

    public function getFotoUrlAttribute()
    {
        return $this->foto
            ? Storage::disk('public')->url($this->foto)
            : $this->defaultFotoUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultFotoUrl()
    {
        return Storage::disk('public')->url('avatar.png');
    }
}