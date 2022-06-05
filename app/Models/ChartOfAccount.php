<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChartOfAccount extends Model
{
    use SoftDeletes;
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
