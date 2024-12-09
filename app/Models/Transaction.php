<?php

namespace App\Models;

use App\Concerns\GetTotalByFundType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    use GetTotalByFundType;

    protected $fillable = [
        'date',
        'description',
        'donation_type',
        'fund_type',
        'amount',
    ];

//    public static function getTotalByFundType($fundType)
//    {
//        return self::where('fund_type', $fundType)->sum('amount');
//    }
}
