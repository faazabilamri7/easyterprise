<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListOfMaterial extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'requested' => 'Requested',
        'processed' => 'Processed',
        'delivered' => 'Delivered',
    ];

    public $table = 'list_of_materials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_list_of_material',
        'id_production_plan_id',
        'request_air',
        'request_sukrosa',
        'request_dektrose',
        'request_perisa_yakult',
        'request_susu_bubuk_krim',
        'request_polietilena_tereftalat',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idListOfMaterialPurchaseRequitions()
    {
        return $this->hasMany(PurchaseRequition::class, 'id_list_of_material_id', 'id');
    }

    public function idListOfMaterialProductionMonitorings()
    {
        return $this->hasMany(ProductionMonitoring::class, 'id_list_of_material_id', 'id');
    }

    public function id_production_plan()
    {
        return $this->belongsTo(Task::class, 'id_production_plan_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
