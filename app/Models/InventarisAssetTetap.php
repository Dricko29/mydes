<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarisAssetTetap extends Model
{
    use HasFactory;
    use Userstamps;
    use HasFormatRupiah;

    protected $guarded = ['id'];

    public function invKategoriAsset(): BelongsTo
    {
        return $this->belongsTo(InvKategoriAsset::class, 'kategori_asset_id');
    }

    public function invAsal(): BelongsTo
    {
        return $this->belongsTo(InvAsal::class, 'asal_id');
    }

    public function invJenisAsset(): BelongsTo
    {
        return $this->belongsTo(InvJenisAsset::class, 'jenis_asset_id');
    }


    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->serial =  InventarisAssetTetap::where('kategori_asset_id', $model->kategori_asset_id)->max('serial') + 1;
            if ($model->kode == '') {
                $model->kode = $model->invKategoriAsset->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
            }
            if ($model->no_register == '') {
                $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriAsset->kode;
            }
            if ($model->nama  == '') {
                $model->nama = $model->invKategoriAsset->nama;
            }
        });

        static::updating(function ($model) {
            if ($model->kategori_asset_id == InventarisAssetTetap::where('id', $model->id)->first('kategori_asset_id')->kategori_asset_id) {
                if ($model->kode == '') {
                    $model->kode = InventarisAssetTetap::where('id', $model->id)->first('kode')->kode;
                }
                if ($model->nama == '') {
                    $model->nama = InventarisAssetTetap::where('id', $model->id)->first('nama')->nama;
                }
                if ($model->no_register == '') {
                    $model->no_register = InventarisAssetTetap::where('id', $model->id)->first('no_register')->no_register;
                }
            } else {
                $model->serial =  InventarisAssetTetap::where('kategori_asset_id', $model->kategori_asset_id)->max('serial') + 1;
                if ($model->kode == '') {
                    $model->kode = $model->invKategoriAsset->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
                }
                if ($model->no_register == '') {
                    $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriAsset->kode;
                }
                if ($model->nama  == '') {
                    $model->nama = $model->invKategoriAsset->nama;
                }
            }
        });
    }
}