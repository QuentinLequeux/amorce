<?php

namespace App\Concerns;

trait GetTotalByFundType
{
    public static function getTotalByFundType($fundType)
    {
        return self::where('fund_type', $fundType)->sum('amount');
    }
}
