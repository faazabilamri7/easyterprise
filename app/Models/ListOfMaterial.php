<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListOfMaterial extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'requested' => 'Requested',
        'delivered' => 'Delivered',
    ];

    public $table = 'list_of_materials';

    protected $dates = [
        'tanggal_mulai',
        'tanggal_selesai',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'production_plan_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'pilihan_bahan_baku',
        'qty',
        'harga_satuan',
        'total',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function production_plan()
    {
        return $this->belongsTo(ProductionPlan::class, 'production_plan_id');
    }

    public function getTanggalMulaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalMulaiAttribute($value)
    {
        $this->attributes['tanggal_mulai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTanggalSelesaiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalSelesaiAttribute($value)
    {
        $this->attributes['tanggal_selesai'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
