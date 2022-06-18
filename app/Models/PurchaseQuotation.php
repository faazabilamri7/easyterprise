<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseQuotation extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'In Negotiation'  => 'In Negotiation',
        'Negotiation end' => 'Negotiation End',
    ];

    public const MATERIAL_NAME_SELECT = [
        'Susu Bubuk Krim'        => 'Susu Bubuk Krim',
        'Air'                    => 'Air',
        'Sukrosa'                => 'Sukrosa',
        'Dextrose'               => 'Dextrose',
        'Perisa Yakult'          => 'Perisa Yakult',
        'Polietilena tereftalat' => 'Polietilena tereftalat',
    ];

    public const PAYMENT_METHOD_SELECT = [
        'Company Bank Account_BCA'     => 'BCA',
        'Company Bank Account_BRI'     => 'BRI',
        'Company Bank Account_MANDIRI' => 'MANDIRI',
        'Company Bank Account_BNI'     => 'BNI',
        'Company Bank Account_PERMATA' => 'PERMATA',
        'Company Bank Account_PAYPAL'  => 'PAYPAL',
    ];

    public $table = 'purchase_quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_purchase_quotation',
        'id_purchase_inquiry_id',
        'id_vendor_id',
        'material_name',
        'unit_price',
        'total_price',
        'payment_method',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        PurchaseQuotation::observe(new \App\Observers\PurchaseQuotationActionObserver());
    }

    public function idPurchaseQuotationPurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'id_purchase_quotation_id', 'id');
    }

    public function id_purchase_inquiry()
    {
        return $this->belongsTo(PurchaseInq::class, 'id_purchase_inquiry_id');
    }

    public function id_vendor()
    {
        return $this->belongsTo(Vendor::class, 'id_vendor_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
