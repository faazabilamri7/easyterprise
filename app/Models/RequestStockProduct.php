<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestStockProduct extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'Requested'  => 'Requested by Warehouse',
        'Accepted'   => 'Accepted by Production',
        'On Process' => 'Production Process',
        'Completed'  => 'Production Completed',
        'Pending'    => 'Production Pending',
    ];

    public $table = 'request_stock_products';

    protected $dates = [
        'tanggal_request',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_request_product',
        'inquiry_id',
        'tanggal_request',
        'request_product_id',
        'qty',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        RequestStockProduct::observe(new \App\Observers\RequestStockProductActionObserver());
    }

    public function idRequestProductTasks()
    {
        return $this->hasMany(Task::class, 'id_request_product_id', 'id');
    }

    public function inquiry()
    {
        return $this->belongsTo(SalesInquiry::class, 'inquiry_id');
    }

    public function getTanggalRequestAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalRequestAttribute($value)
    {
        $this->attributes['tanggal_request'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function request_product()
    {
        return $this->belongsTo(Product::class, 'request_product_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
