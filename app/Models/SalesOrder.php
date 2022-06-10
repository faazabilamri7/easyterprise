<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Received'   => 'Received',
        'On Process' => 'On Process',
        'Done'       => 'Done',
    ];

    public $table = 'sales_orders';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'no_sales_order',
        'id_sales_quotation_id',
        'tanggal',
        'detail_order',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function salesOrderCustomerComplains()
    {
        return $this->hasMany(CustomerComplain::class, 'sales_order_id', 'id');
    }

    public function statusSalesReports()
    {
        return $this->hasMany(SalesReport::class, 'status_id', 'id');
    }

    public function tglSalesOrderSalesReports()
    {
        return $this->hasMany(SalesReport::class, 'tgl_sales_order_id', 'id');
    }

    public function salesProductTransaksiKeuangans()
    {
        return $this->hasMany(TransaksiKeuangan::class, 'sales_product_id', 'id');
    }

    public function id_sales_quotation()
    {
        return $this->belongsTo(SalesQuotation::class, 'id_sales_quotation_id');
    }

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
