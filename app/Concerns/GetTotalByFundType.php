<?php

namespace App\Concerns;

trait GetTotalByFundType
{
    public static function getTotalByFundId($fundId)
    {
        return self::where('fund_id', $fundId)->sum('amount');
    }
}
