<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseRequition extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'Requested'  => 'Requested by Warehouse',
        'Accepted'   => 'Accepted by Production',
        'On Process' => 'Production Process',
        'Completed'  => 'Production Completed',
        'Pending'    => 'Production Pending',
    ];

    public $table = 'purchase_requitions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_purchase_requition',
        'id_list_of_material_id',
        'status',
        'material_1_id',
        'qty_1',
        'material_2_id',
        'qty_2',
        'material_3_id',
        'qty_3',
        'material_4_id',
        'qty_4',
        'material_5_id',
        'qty_5',
        'material_6_id',
        'qty_6',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function idPurchaseRequisitionRequestForQuotations()
    {
        return $this->hasMany(RequestForQuotation::class, 'id_purchase_requisition_id', 'id');
    }

    public function id_list_of_material()
    {
        return $this->belongsTo(ListOfMaterial::class, 'id_list_of_material_id');
    }

    public function material_1()
    {
        return $this->belongsTo(Material::class, 'material_1_id');
    }

    public function material_2()
    {
        return $this->belongsTo(Material::class, 'material_2_id');
    }

    public function material_3()
    {
        return $this->belongsTo(Material::class, 'material_3_id');
    }

    public function material_4()
    {
        return $this->belongsTo(Material::class, 'material_4_id');
    }

    public function material_5()
    {
        return $this->belongsTo(Material::class, 'material_5_id');
    }

    public function material_6()
    {
        return $this->belongsTo(Material::class, 'material_6_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
