<?php

namespace App\Enums;

enum PropertyTypeEnum: string
{
    case SINGLE = 'Single-family Home';
    case MULTIFAMILY = 'Multi-family Home';
    case TOWNHOUSE = 'Townhouse';
    case BUNGALOW = 'Bungalow';
}
