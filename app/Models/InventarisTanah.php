<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarisTanah extends Model
{
    use HasFactory;
    use Userstamps;
    use HasFormatRupiah;
    protected $guarded = ['id'];

    public function invKategoriTanah(): BelongsTo
    {
        return $this->belongsTo(InvKategoriTanah::class, 'kategori_tanah_id');
    }

    public function invHakTanah(): BelongsTo
    {
        return $this->belongsTo(InvHakTanah::class, 'hak_tanah_id');
    }

    public function invAsal(): BelongsTo
    {
        return $this->belongsTo(InvAsal::class, 'asal_id');
    }

    public function invPenggunaan(): BelongsTo
    {
        return $this->belongsTo(InvPenggunaan::class, 'penggunaan_id');
    }

    public function invPenggunaBarang(): BelongsTo
    {
        return $this->belongsTo(InvPenggunaBarang::class, 'pengguna_barang_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->serial =  InventarisTanah::where('kategori_tanah_id', $model->kategori_tanah_id)->max('serial') + 1;
            if ($model->kode == '') {
                $model->kode = $model->invKategoriTanah->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
            }
            if ($model->no_register == '') {
                $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriTanah->kode;
            }
            if ($model->nama  == '') {
                $model->nama = $model->invKategoriTanah->nama;
            }
        });

        static::updating(function ($model) {
            if ($model->inv_kategori_tanah_id == InventarisTanah::where('id', $model->id)->first('inv_kategori_tanah_id')->inv_kategori_tanah_id) {
                if ($model->kode == '') {
                    $model->kode = InventarisTanah::where('id', $model->id)->first('kode')->kode;
                }
                if ($model->nama == '') {
                    $model->nama = InventarisTanah::where('id', $model->id)->first('nama')->nama;
                }
                if ($model->no_register == '') {
                    $model->no_register = InventarisTanah::where('id', $model->id)->first('no_register')->no_register;
                }
            } else {
                $model->serial =  InventarisTanah::where('inv_kategori_tanah_id', $model->kategori_tanah_id)->max('serial') + 1;
                if ($model->kode == '') {
                    $model->kode = $model->invKategoriTanah->kode . '-' . str_pad($model->serial, 5, '0', STR_PAD_LEFT);
                }
                if ($model->no_register == '') {
                    $model->no_register = date('d.m.y') . '.' . $model->serial . $model->invKategoriTanah->kode;
                }
                if ($model->nama  == '') {
                    $model->nama = $model->invKategoriTanah->nama;
                }
            }
        });
    }
}