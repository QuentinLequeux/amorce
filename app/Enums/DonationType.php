<?php

namespace App\Enums;

enum DonationType: string
{
    case Virement = 'Virement';

    case Liquide = 'Liquide';
}
