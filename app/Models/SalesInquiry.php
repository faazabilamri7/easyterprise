<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesInquiry extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Requested' => 'Requested',
        'Processed' => 'Processed',
        'Completed' => 'Completed',
    ];

    public $table = 'sales_inquiries';

    protected $dates = [
        'tgl_inquiry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'inquiry_kode',
        'tgl_inquiry',
        'id_customer_id',
        'nama_produk_id',
        'qty',
        'status',
        'catatan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function inquiryRequestStockProducts()
    {
        return $this->hasMany(RequestStockProduct::class, 'inquiry_id', 'id');
    }

    public function kodeInquirySalesQuotations()
    {
        return $this->hasMany(SalesQuotation::class, 'kode_inquiry_id', 'id');
    }

    public function getTglInquiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglInquiryAttribute($value)
    {
        $this->attributes['tgl_inquiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function id_customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'id_customer_id');
    }

    public function nama_produk()
    {
        return $this->belongsTo(Product::class, 'nama_produk_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
