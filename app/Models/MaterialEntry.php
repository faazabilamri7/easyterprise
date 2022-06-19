<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MaterialEntry extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'on_delivery'     => 'On Delivery',
        'Delivered'       => 'Delivered',
        'Verified'        => 'Verified',
        'Unverified'      => 'Unverified',
        'Return_received' => 'Return Received',
    ];

    public $table = 'material_entries';

    protected $dates = [
        'date_material_entry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_material_entry',
        'id_purchase_order_id',
        'date_material_entry',
        'material_name_id',
        'qty',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        MaterialEntry::observe(new \App\Observers\MaterialEntryActionObserver());
    }

    public function id_purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class, 'id_purchase_order_id');
    }

    public function getDateMaterialEntryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateMaterialEntryAttribute($value)
    {
        $this->attributes['date_material_entry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
