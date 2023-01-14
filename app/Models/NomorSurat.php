<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Wildside\Userstamps\Userstamps;

class NomorSurat extends Model
{
    use HasFactory;
    use Userstamps;

    protected $guarded = ['id'];

    public function surat() : BelongsTo
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->serial =  NomorSurat::where('surat_id', $model->surat_id)->max('serial') + 1;
            if ($model->nomor == '') {
                $model->nomor = $model->surat->klasifikasiSurat->kode . '/' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
            }
        });

        static::updating(function ($model) {
            if ($model->surat_id == NomorSurat::where('id', $model->id)->first('surat_id')->surat_id) {
                if ($model->nomor == '') {
                    $model->nomor = NomorSurat::where('id', $model->id)->first('nomor')->nomor;
                }
            } else {
                $model->serial =  NomorSurat::where('surat_id', $model->surat_id)->max('serial') + 1;
                if ($model->nomor == '') {
                    $model->nomor = $model->surat->klasifikasiSurat->kode . '/' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
                }
            }
        });
    }
}