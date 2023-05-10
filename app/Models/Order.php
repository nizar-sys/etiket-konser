<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pemesanan',
        'event_id',
        'nama_pemesan',
        'email_pemesan',
        'no_hp_pemesan',
        'jumlah_tiket',
        'status_pemakaian'
    ];

    protected $appends = [
        'total_harga',
        'status'
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

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function getTotalHargaAttribute()
    {
        return 'Rp. ' . number_format($this->jumlah_tiket * $this->event->harga_tiket, 0, ',', '.');
    }

    public function getStatusAttribute()
    {
        return $this->status_pemakaian == 'belum' ? 'Belum Digunakan' : 'Sudah Digunakan';
    }
}
