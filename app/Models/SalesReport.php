<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesReport extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sales_reports';

    protected $dates = [
        'tanggal_laporan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tanggal_laporan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTanggalLaporanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalLaporanAttribute($value)
    {
        $this->attributes['tanggal_laporan'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
