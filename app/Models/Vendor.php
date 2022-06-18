<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'vendors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_vendor',
        'nama_vendor',
        'telepon',
        'email',
        'alamat',
        'website',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Vendor::observe(new \App\Observers\VendorActionObserver());
    }

    public function perusahaanInvoicePembelians()
    {
        return $this->hasMany(InvoicePembelian::class, 'perusahaan_id', 'id');
    }

    public function vendorDocumentsVendors()
    {
        return $this->hasMany(DocumentsVendor::class, 'vendor_id', 'id');
    }

    public function vendorNotesVendors()
    {
        return $this->hasMany(NotesVendor::class, 'vendor_id', 'id');
    }

    public function idVendorPurchaseQuotations()
    {
        return $this->hasMany(PurchaseQuotation::class, 'id_vendor_id', 'id');
    }

    public function vendorNamePurchaseInqs()
    {
        return $this->hasMany(PurchaseInq::class, 'vendor_name_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
