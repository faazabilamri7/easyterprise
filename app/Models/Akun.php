<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Akun extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'akuns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'jenis_akun',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Akun::observe(new \App\Observers\AkunActionObserver());
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
