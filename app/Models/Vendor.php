<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'vendors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_purchase_inquiry_id',
        'nama_vendor',
        'telepon',
        'email',
        'alamat',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function perusahaanInvoicePembelians()
    {
        return $this->hasMany(InvoicePembelian::class, 'perusahaan_id', 'id');
    }

    public function id_purchase_inquiry()
    {
        return $this->belongsTo(PurchaseInq::class, 'id_purchase_inquiry_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
