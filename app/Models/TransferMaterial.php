<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferMaterial extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TRANSFER_KE_SELECT = [
    ];

    public const TRANSFER_DARI_SELECT = [
    ];

    public $table = 'transfer_materials';

    protected $dates = [
        'tanggal_transaksi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tanggal_transaksi',
        'transfer_dari',
        'transfer_ke',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getTanggalTransaksiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalTransaksiAttribute($value)
    {
        $this->attributes['tanggal_transaksi'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
