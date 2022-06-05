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
        'Accepted'   => 'Accepted',
        'On Process' => 'On Process',
        'Pending'    => 'Pending',
        'Completed'  => 'Completed',
    ];

    public const INQUIRY_SELECT = [
        'Yakult Original 65 Ml Case of 7' => 'Yakult Original 65 Ml Case of 7',
        'Yakult Light 65 Ml Case of 7'    => 'Yakult Light 65 Ml Case of 7',
    ];

    public $table = 'sales_inquiries';

    protected $dates = [
        'tgl_inquiry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_customer_id',
        'inquiry',
        'tgl_inquiry',
        'id_product_id',
        'qty',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function inquiryRequestStockProducts()
    {
        return $this->hasMany(RequestStockProduct::class, 'inquiry_id', 'id');
    }

    public function id_customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'id_customer_id');
    }

    public function getTglInquiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTglInquiryAttribute($value)
    {
        $this->attributes['tgl_inquiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function id_product()
    {
        return $this->belongsTo(Product::class, 'id_product_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
