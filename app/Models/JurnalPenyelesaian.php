<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JurnalPenyelesaian extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'jurnal_penyelesaians';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'akun_id',
        'keterangan',
        'debit',
        'kredit',
        'total_debit',
        'total_kredit',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        JurnalPenyelesaian::observe(new \App\Observers\JurnalPenyelesaianActionObserver());
    }

    public function akun()
    {
        return $this->belongsTo(ChartOfAccount::class, 'akun_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
