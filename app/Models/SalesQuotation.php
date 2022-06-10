<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesQuotation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Requested' => 'Requested',
        'Accepted'  => 'Accepted',
        'Pending'   => 'Pending',
        'Completed' => 'Completed',
    ];

    public $table = 'sales_quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kode_inquiry_id',
        'harga',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function salesQuotationSalesOrders()
    {
        return $this->hasMany(SalesOrder::class, 'sales_quotation_id', 'id');
    }

    public function kode_inquiry()
    {
        return $this->belongsTo(SalesInquiry::class, 'kode_inquiry_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
