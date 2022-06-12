<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestForQuotation extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'Request Permission'  => 'Request Permission',
        'Approved by Manager' => 'Approved by Manager',
    ];

    public $table = 'request_for_quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_request_for_quotation',
        'id_purchase_requisition_id',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        RequestForQuotation::observe(new \App\Observers\RequestForQuotationActionObserver());
    }

    public function idRequestForQuotationPurchaseInqs()
    {
        return $this->hasMany(PurchaseInq::class, 'id_request_for_quotation_id', 'id');
    }

    public function id_purchase_requisition()
    {
        return $this->belongsTo(PurchaseRequition::class, 'id_purchase_requisition_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
