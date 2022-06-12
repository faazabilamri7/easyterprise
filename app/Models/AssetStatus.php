<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetStatus extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'asset_statuses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        AssetStatus::observe(new \App\Observers\AssetStatusActionObserver());
    }

    public function statusAssets()
    {
        return $this->hasMany(Asset::class, 'status_id', 'id');
    }

    public function statusAssetsHistories()
    {
        return $this->hasMany(AssetsHistory::class, 'status_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
