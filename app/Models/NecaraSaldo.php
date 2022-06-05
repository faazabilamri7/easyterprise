<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NecaraSaldo extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'necara_saldos';

    protected $dates = [
        'tanggal',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tanggal',
        'akun_id',
        'debit',
        'kredit',
        'total_debit',
        'total_kredit',
        'total',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTanggalAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
