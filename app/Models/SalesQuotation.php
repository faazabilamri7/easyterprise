<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesQuotation extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'Requested' => 'Requested',
        'Accepted'  => 'Accepted',
    ];

    public $table = 'sales_quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_sales_quotation',
        'kode_inquiry_id',
        'harga',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        SalesQuotation::observe(new \App\Observers\SalesQuotationActionObserver());
    }

    public function idSalesQuotationSalesOrders()
    {
        return $this->hasMany(SalesOrder::class, 'id_sales_quotation_id', 'id');
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
