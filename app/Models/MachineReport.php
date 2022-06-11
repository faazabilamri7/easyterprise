<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MachineReport extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'ready'       => 'Ready',
        'not_ready'   => 'Not Ready',
        'need_repair' => 'Need Repair',
    ];

    public $table = 'machine_reports';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_mesin',
        'nama_mesin',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idMesinTasks()
    {
        return $this->hasMany(Task::class, 'id_mesin_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
