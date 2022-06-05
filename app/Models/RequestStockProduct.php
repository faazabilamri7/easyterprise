<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestStockProduct extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'request_stock_products';

    protected $dates = [
        'tanggal_request',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tanggal_request',
        'inquiry_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTanggalRequestAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalRequestAttribute($value)
    {
        $this->attributes['tanggal_request'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function inquiry()
    {
        return $this->belongsTo(SalesInquiry::class, 'inquiry_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
