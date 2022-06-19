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

class Material extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public $table = 'materials';

    protected $appends = [
        'photo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_material',
        'descriptive',
        'stock',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Material::observe(new \App\Observers\MaterialActionObserver());
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function material1PurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'material_1_id', 'id');
    }

    public function material2PurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'material_2_id', 'id');
    }

    public function material3PurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'material_3_id', 'id');
    }

    public function material4PurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'material_4_id', 'id');
    }

    public function material5PurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'material_5_id', 'id');
    }

    public function material6PurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'material_6_id', 'id');
    }

    public function materialNamePurchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'material_name_id', 'id');
    }

    public function materialNamePurchaseInqs()
    {
        return $this->hasMany(PurchaseInq::class, 'material_name_id', 'id');
    }

    public function materialNameRequestForQuotations()
    {
        return $this->hasMany(RequestForQuotation::class, 'material_name_id', 'id');
    }

    public function materialNameMaterialEntries()
    {
        return $this->hasMany(MaterialEntry::class, 'material_name_id', 'id');
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
