<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseQuotation extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PAYMENT_METHOD_SELECT = [
        'Company Bank Account' => 'Rekening Bank',
        'OVO'                  => 'OVO',
        'DANA'                 => 'DANA',
        'GOPAY'                => 'GOPAY',
        'ShopeePay'            => 'ShopeePay',
    ];

    public $table = 'purchase_quotations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_vendor_id',
        'material_name',
        'unit_price',
        'total_price',
        'payment_method',
        'status',
        'nego_purchase_quotation',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_vendor()
    {
        return $this->belongsTo(Vendor::class, 'id_vendor_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
