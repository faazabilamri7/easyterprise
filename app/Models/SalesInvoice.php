<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesInvoice extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_RADIO = [
        'Unpaid' => 'Unpaid',
        'Paid'   => 'Paid',
    ];

    public $table = 'sales_invoices';

    protected $dates = [
        'tanggal',
        'jatuh_tempo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'no_sales_invoice',
        'sales_order_id',
        'customer_id',
        'tanggal',
        'jatuh_tempo',
        'total',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        SalesInvoice::observe(new \App\Observers\SalesInvoiceActionObserver());
    }

    public function sales_order()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    }

    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'customer_id');
    }

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getJatuhTempoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJatuhTempoAttribute($value)
    {
        $this->attributes['jatuh_tempo'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
