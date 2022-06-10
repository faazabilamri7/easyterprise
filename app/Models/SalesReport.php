<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesReport extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sales_reports';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status_id',
        'tgl_sales_order_id',
        'no_sales_order_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function status()
    {
        return $this->belongsTo(SalesOrder::class, 'status_id');
    }

    public function tgl_sales_order()
    {
        return $this->belongsTo(SalesOrder::class, 'tgl_sales_order_id');
    }

    public function no_sales_order()
    {
        return $this->belongsTo(SalesOrder::class, 'no_sales_order_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
