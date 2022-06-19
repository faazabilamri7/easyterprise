<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferProduk extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'On Delivery' => 'On Delivery',
        'Delivered'   => 'Delivered',
    ];

    public $table = 'transfer_produks';

    protected $dates = [
        'date_product_entry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_transfer_produk',
        'id_quality_control_id',
        'product_name_id',
        'date_product_entry',
        'qty',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        TransferProduk::observe(new \App\Observers\TransferProdukActionObserver());
    }

    public function id_quality_control()
    {
        return $this->belongsTo(QualityControl::class, 'id_quality_control_id');
    }

    public function product_name()
    {
        return $this->belongsTo(Product::class, 'product_name_id');
    }

    public function getDateProductEntryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateProductEntryAttribute($value)
    {
        $this->attributes['date_product_entry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
