<?php

namespace App\Models;

use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LayananMandiri extends Model
{
    use HasFactory;
    use Userstamps;
    use Notifiable;

    protected $guarded = ['id'];

    public function penduduk() : BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

}