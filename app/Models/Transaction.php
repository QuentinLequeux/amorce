<?php

namespace App\Models;

use App\Concerns\GetTotalByFundType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    use GetTotalByFundType;

    protected $fillable = [
        'date',
        'description',
        'donation_type',
        'fund_id',
        'amount',
    ];

    public function fund(): BelongsTo
    {
        return $this->belongsTo(Fund::class, 'fund_id');
    }

    public static function search(array $columns, $query)
    {
        return static::where(function ($q) use ($columns, $query) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'like', '%' . $query . '%');
            }
        });
    }

//    public static function search($column, $query)
//    {
//        return static::where($column, 'like', '%' . $query . '%');
//    }

//    public static function getTotalByFundType($fundType)
//    {
//        return self::where('fund_type', $fundType)->sum('amount');
//    }
}
