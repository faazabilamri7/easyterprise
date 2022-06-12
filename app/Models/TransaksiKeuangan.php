<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiKeuangan extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'transaksi_keuangans';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kas_bank_id',
        'tanggal',
        'desc',
        'nominal',
        'jenis_pembayaran',
        'qty',
        'harga_unit',
        'total',
        'sales_product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        TransaksiKeuangan::observe(new \App\Observers\TransaksiKeuanganActionObserver());
    }

    public function kas_bank()
    {
        return $this->belongsTo(KasBank::class, 'kas_bank_id');
    }

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function sales_product()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_product_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
