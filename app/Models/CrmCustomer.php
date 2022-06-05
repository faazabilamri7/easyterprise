<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmCustomer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'crm_customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'status_id',
        'email',
        'phone',
        'address',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idCustomerSalesInquiries()
    {
        return $this->hasMany(SalesInquiry::class, 'id_customer_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(CrmStatus::class, 'status_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
