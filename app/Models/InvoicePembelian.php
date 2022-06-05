<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePembelian extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'invoice_pembelians';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nomor',
        'tanggal',
        'perusahaan_id',
        'customer_id',
        'total',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function perusahaan()
    {
        return $this->belongsTo(Vendor::class, 'perusahaan_id');
    }

    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'customer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
