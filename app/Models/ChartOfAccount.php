<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChartOfAccount extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'chart_of_accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'account_code',
        'account_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        ChartOfAccount::observe(new \App\Observers\ChartOfAccountActionObserver());
    }

    public function akunJurnalUmums()
    {
        return $this->hasMany(JurnalUmum::class, 'akun_id', 'id');
    }

    public function akunBukuBesars()
    {
        return $this->hasMany(BukuBesar::class, 'akun_id', 'id');
    }

    public function akunNecaraSaldos()
    {
        return $this->hasMany(NecaraSaldo::class, 'akun_id', 'id');
    }

    public function akunJurnalPenyelesaians()
    {
        return $this->hasMany(JurnalPenyelesaian::class, 'akun_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
