<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseReturn extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'On_delivery_to_vendor' => 'On delivery to Vendor',
        'delivered_to_vendor'   => 'Delivered to Vendor',
    ];

    public $table = 'purchase_returns';

    protected $dates = [
        'date_purchase_return',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_purchase_return',
        'id_purchase_order_id',
        'date_purchase_return',
        'material_name',
        'qty',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        PurchaseReturn::observe(new \App\Observers\PurchaseReturnActionObserver());
    }

    public function id_purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order_id');
    }

    public function getDatePurchaseReturnAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePurchaseReturnAttribute($value)
    {
        $this->attributes['date_purchase_return'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
