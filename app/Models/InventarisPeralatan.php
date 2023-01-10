<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventarisPeralatan extends Model
{
    use HasFactory;
    use Userstamps;
    use HasFormatRupiah;
    protected $guarded = ['id'];

    public function invAsal() : BelongsTo
    {
        return $this->belongsTo(InvAsal::class, 'asal_id');
    }
    
    public function invKategoriPeralatan() : BelongsTo
    {
        return $this->belongsTo(InvKategoriPeralatan::class, 'kategori_peralatan_id');
    }

    public function invPenggunaBarang(): BelongsTo
    {
        return $this->belongsTo(InvPenggunaBarang::class, 'pengguna_barang_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->serial =  InventarisPeralatan::where('kategori_peralatan_id', $model->kategori_peralatan_id)->max('serial') + 1;
            if ($model->kode == '') {
                $model->kode = $model->invKategoriPeralatan->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
            }
            if ($model->no_register == '') {
                $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriPeralatan->kode;
            }
            if ($model->nama  == '') {
                $model->nama = $model->invKategoriPeralatan->nama;
            }
        });

        static::updating(function ($model) {
            if ($model->kategori_peralatan_id == InventarisPeralatan::where('id', $model->id)->first('kategori_peralatan_id')->kategori_peralatan_id) {
                if ($model->kode == '') {
                    $model->kode = InventarisPeralatan::where('id', $model->id)->first('kode')->kode;
                }
                if ($model->nama == '') {
                    $model->nama = InventarisPeralatan::where('id', $model->id)->first('nama')->nama;
                }
                if ($model->no_register == '') {
                    $model->no_register = InventarisPeralatan::where('id', $model->id)->first('no_register')->no_register;
                }
            } else {
                $model->serial =  InventarisPeralatan::where('kategori_peralatan_id', $model->kategori_peralatan_id)->max('serial') + 1;
                if ($model->kode == '') {
                    $model->kode = $model->invKategoriPeralatan->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
                }
                if ($model->no_register == '') {
                    $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriPeralatan->kode;
                }
                if ($model->nama  == '') {
                    $model->nama = $model->invKategoriPeralatan->nama;
                }
            }
        });
    }
}