<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'purchase_orders';

    protected $dates = [
        'date_purchase_order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_purchase_order',
        'id_purchase_quotation_id',
        'date_purchase_order',
        'material_name',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idPurchaseOrderMaterialEntries()
    {
        return $this->hasMany(MaterialEntry::class, 'id_purchase_order_id', 'id');
    }

    public function idPurchaseOrderPurchaseReturns()
    {
        return $this->hasMany(PurchaseReturn::class, 'id_purchase_order_id', 'id');
    }

    public function id_purchase_quotation()
    {
        return $this->belongsTo(PurchaseQuotation::class, 'id_purchase_quotation_id');
    }

    public function getDatePurchaseOrderAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePurchaseOrderAttribute($value)
    {
        $this->attributes['date_purchase_order'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
