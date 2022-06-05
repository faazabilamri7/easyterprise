<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseInq extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'purchase_inqs';

    protected $dates = [
        'date_purchase_inquiry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_request_for_quotation_id',
        'date_purchase_inquiry',
        'material_name',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_request_for_quotation()
    {
        return $this->belongsTo(RequestForQuotation::class, 'id_request_for_quotation_id');
    }

    public function getDatePurchaseInquiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePurchaseInquiryAttribute($value)
    {
        $this->attributes['date_purchase_inquiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
