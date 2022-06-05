<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferProduk extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TRANSFER_KE_SELECT = [
    ];

    public const TRANSFER_DARI_SELECT = [
    ];

    public $table = 'transfer_produks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama_produk',
        'transfer_dari',
        'transfer_ke',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
