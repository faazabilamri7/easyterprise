<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionMonitoring extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'Done'        => 'Done',
        'On Progress' => 'On Progress',
    ];

    public $table = 'production_monitorings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'production_plan_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function production_plan()
    {
        return $this->belongsTo(ProductionPlan::class, 'production_plan_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
