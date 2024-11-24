<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'fund_type',
        'donation_type',
        'description',
        'amount',
    ];

    public static function getTotalByFundType($fundType)
    {
        return self::where('fund_type', $fundType)->sum('amount');
    }
}
