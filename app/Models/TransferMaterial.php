<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransferMaterial extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const STATUS_SELECT = [
        'On Delivery' => 'On Delivery',
        'Delivered'   => 'Delivered',
    ];

    public $table = 'transfer_materials';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_transfer_material',
        'id_list_of_material_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_list_of_material()
    {
        return $this->belongsTo(ListOfMaterial::class, 'id_list_of_material_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
