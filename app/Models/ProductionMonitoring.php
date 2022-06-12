<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionMonitoring extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'pembibitan'               => 'Nursery',
        'Fermentasi'               => 'Fermentation',
        'Pencampuran Gula dan Air' => 'Materials Mixing',
        'Pembuatan Botol'          => 'Bottle Making',
        'Pengemasan'               => 'Packaging',
    ];

    public $table = 'production_monitorings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_production_monitoring',
        'id_list_of_material_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idProductionMonitoringQualityControls()
    {
        return $this->hasMany(QualityControl::class, 'id_production_monitoring_id', 'id');
    }

    public function id_list_of_material()
    {
        return $this->belongsTo(ListOfMaterial::class, 'id_list_of_material_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
