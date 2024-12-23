<?php

namespace App\Enums;

enum ProductStatus: int
{
    case PENDING = 0;
    case ACTIVE = 1;
    case NEW = 2;
    case SALE = 3;
    case SOLD = 4;

    public static function toName($value): string
    {
        return match($value) {
            self::PENDING->value => 'PENDING',
            self::ACTIVE->value => 'ACTIVE',
            self::NEW->value => 'NEW',
            self::SALE->value => 'SALE',
            self::SOLD->value => 'SOLD',
        };
    }
}
