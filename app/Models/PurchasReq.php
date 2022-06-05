<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchasReq extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'purchas_reqs';

    protected $dates = [
        'date_purchase_requisition',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_list_of_material',
        'date_purchase_requisition',
        'total_price',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDatePurchaseRequisitionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePurchaseRequisitionAttribute($value)
    {
        $this->attributes['date_purchase_requisition'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
