<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsHistory extends Model
{
    use HasFactory;

    public $table = 'assets_histories';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'asset_id',
        'status_id',
        'location_id',
        'assigned_user_id',
        'created_at',
        'updated_at',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function status()
    {
        return $this->belongsTo(AssetStatus::class, 'status_id');
    }

    public function location()
    {
        return $this->belongsTo(AssetLocation::class, 'location_id');
    }

    public function assigned_user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
