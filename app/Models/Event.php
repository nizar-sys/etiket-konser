<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_acara',
        'harga_tiket',
        'tanggal_acara',
        'deskripsi_acara',
        'lokasi',
        'poster'
    ];

    protected $appends = [
        'formated_date',
        'formated_price'
    ];

    // function boot
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->created_at = now();
        });

        self::updating(function ($model) {
            $model->updated_at = now();
        });
    }

    // tanggal acara diff for humans dengan format tanggal, bulan tahun
    public function getFormatedDateAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tanggal_acara'])->translatedFormat('d F Y');
    }

    // harga tiket dengan format rupiah
    public function getFormatedPriceAttribute()
    {
        return 'Rp. ' . number_format($this->attributes['harga_tiket'], 0, ',', '.');
    }
}
