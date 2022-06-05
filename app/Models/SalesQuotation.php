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

    public $table = 'sales_quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_sales_inquiry_id',
        'id_customer_id',
        'harga',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_sales_inquiry()
    {
        return $this->belongsTo(SalesInquiry::class, 'id_sales_inquiry_id');
    }

    public function id_customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'id_customer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
