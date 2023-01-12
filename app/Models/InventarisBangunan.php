<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarisBangunan extends Model
{
    use HasFactory;
    use Userstamps;
    use HasFormatRupiah;

    protected $guarded = ['id'];

    public function invKategoriBangunan(): BelongsTo
    {
        return $this->belongsTo(InvKategoriBangunan::class, 'kategori_bangunan_id');
    }

    public function invAsal(): BelongsTo
    {
        return $this->belongsTo(InvAsal::class, 'asal_id');
    }


    public function invPenggunaBarang(): BelongsTo
    {
        return $this->belongsTo(InvPenggunaBarang::class, 'pengguna_barang_id');
    }

    public function invKondisiBangunan(): BelongsTo
    {
        return $this->belongsTo(InvKondisiBangunan::class, 'kondisi_bangunan_id');
    }

    public function invStatusTanah(): BelongsTo
    {
        return $this->belongsTo(InvStatusTanah::class, 'status_tanah_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->serial =  InventarisBangunan::where('kategori_bangunan_id', $model->kategori_bangunan_id)->max('serial') + 1;
            if ($model->kode == '') {
                $model->kode = $model->invKategoriBangunan->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
            }
            if ($model->no_register == '') {
                $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriBangunan->kode;
            }
            if ($model->nama  == '') {
                $model->nama = $model->invKategoriBangunan->nama;
            }
        });

        static::updating(function ($model) {
            if ($model->kategori_bangunan_id == InventarisBangunan::where('id', $model->id)->first('kategori_bangunan_id')->kategori_bangunan_id) {
                if ($model->kode == '') {
                    $model->kode = InventarisBangunan::where('id', $model->id)->first('kode')->kode;
                }
                if ($model->nama == '') {
                    $model->nama = InventarisBangunan::where('id', $model->id)->first('nama')->nama;
                }
                if ($model->no_register == '') {
                    $model->no_register = InventarisBangunan::where('id', $model->id)->first('no_register')->no_register;
                }
            } else {
                $model->serial =  InventarisBangunan::where('kategori_bangunan_id', $model->kategori_bangunan_id)->max('serial') + 1;
                if ($model->kode == '') {
                    $model->kode = $model->invKategoriBangunan->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
                }
                if ($model->no_register == '') {
                    $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriBangunan->kode;
                }
                if ($model->nama  == '') {
                    $model->nama = $model->invKategoriBangunan->nama;
                }
            }
        });
    }
}