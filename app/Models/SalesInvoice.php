<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SalesInvoice extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const STATUS_RADIO = [
        'Unpaid' => 'Unpaid',
        'Paid'   => 'Paid',
    ];

    public $table = 'sales_invoices';

    protected $appends = [
        'sales_invoice',
        'bukti_pembayaran',
    ];

    protected $dates = [
        'jatuh_tempo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'no_sales_invoice',
        'sales_order_id',
        'jatuh_tempo',
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

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getSalesInvoiceAttribute()
    {
        return $this->getMedia('sales_invoice')->last();
    }

    public function sales_order()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    }

    public function getJatuhTempoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setJatuhTempoAttribute($value)
    {
        $this->attributes['jatuh_tempo'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBuktiPembayaranAttribute()
    {
        $file = $this->getMedia('bukti_pembayaran')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
