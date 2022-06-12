<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const TAG_RADIO = [
        'Available'    => 'Available',
        'Out of Stock' => 'Out of Stock',
    ];

    public $table = 'products';

    protected $appends = [
        'foto_produk',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'tag',
        'stok',
        'harga_jual',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Product::observe(new \App\Observers\ProductActionObserver());
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function namaProdukSalesInquiries()
    {
        return $this->hasMany(SalesInquiry::class, 'nama_produk_id', 'id');
    }

    public function requestProductRequestStockProducts()
    {
        return $this->hasMany(RequestStockProduct::class, 'request_product_id', 'id');
    }

    public function productNameTransferProduks()
    {
        return $this->hasMany(TransferProduk::class, 'product_name_id', 'id');
    }

    public function getFotoProdukAttribute()
    {
        $file = $this->getMedia('foto_produk')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
