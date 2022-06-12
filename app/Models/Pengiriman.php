<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengiriman extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_PENGIRIMAN_SELECT = [
        'On Delivery' => 'On Delivery',
        'Delivered'   => 'Delivered',
    ];

    public $table = 'pengirimen';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_pengiriman',
        'no_sales_order_id',
        'status_pengiriman',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Pengiriman::observe(new \App\Observers\PengirimanActionObserver());
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
