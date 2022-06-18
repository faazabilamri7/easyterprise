<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseInq extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'purchase_inqs';

    protected $dates = [
        'date_puchase_inquiry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_purchase_inquiry',
        'id_request_for_quotation_id',
        'vendor_name_id',
        'date_puchase_inquiry',
        'material_name_id',
        'qty',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        PurchaseInq::observe(new \App\Observers\PurchaseInqActionObserver());
    }

    public function idPurchaseInquiryPurchaseQuotations()
    {
        return $this->hasMany(PurchaseQuotation::class, 'id_purchase_inquiry_id', 'id');
    }

    public function id_request_for_quotation()
    {
        return $this->belongsTo(RequestForQuotation::class, 'id_request_for_quotation_id');
    }

    public function vendor_name()
    {
        return $this->belongsTo(Vendor::class, 'vendor_name_id');
    }

    public function getDatePuchaseInquiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePuchaseInquiryAttribute($value)
    {
        $this->attributes['date_puchase_inquiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function material_name()
    {
        return $this->belongsTo(Material::class, 'material_name_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
