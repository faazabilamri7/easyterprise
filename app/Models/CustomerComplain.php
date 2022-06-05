<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerComplain extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'customer_complains';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_customer_id',
        'keluhan',
        'kritik',
        'saran',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_customer()
    {
        return $this->belongsTo(CrmCustomer::class, 'id_customer_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
