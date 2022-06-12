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

    public const CATEGORY_SELECT = [
        '1' => 'Assets',
        '2' => 'Liabilities',
        '3' => 'Equity',
        '4' => 'Income',
        '5' => 'Expenses',
    ];

    public $table = 'chart_of_accounts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'account_code',
        'account_name',
        'category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        ChartOfAccount::observe(new \App\Observers\ChartOfAccountActionObserver());
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
