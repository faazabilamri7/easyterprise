<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionPlan extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'production_plans';

    protected $dates = [
        'created_at',
        'tanggal_mulai',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'tugas',
        'tanggal_mulai',
        'durasi',
        'rincian',
        'updated_at',
        'deleted_at',
    ];

    public function productionPlanListOfMaterials()
    {
        return $this->hasMany(ListOfMaterial::class, 'production_plan_id', 'id');
    }

    public function productionPlanProductionMonitorings()
    {
        return $this->hasMany(ProductionMonitoring::class, 'production_plan_id', 'id');
    }

    public function productionPlanMachineReports()
    {
        return $this->hasMany(MachineReport::class, 'production_plan_id', 'id');
    }

    public function getTanggalMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalMulaiAttribute($value)
    {
        $this->attributes['tanggal_mulai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
