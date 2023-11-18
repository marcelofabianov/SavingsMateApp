<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionValueTypeEnum: int
{
    case VARIABLE = 0;
    case FIXED = 1;

    public static function getValues(): array
    {
        return [
            self::VARIABLE,
            self::FIXED,
        ];
    }

    public static function random(): TransactionValueTypeEnum
    {
        $values = self::getValues();
        $randomIndex = array_rand($values);

        return $values[$randomIndex];
    }

    public static function has(int|self $value): bool
    {
        if ($value instanceof self) {
            return true;
        }

        return ! is_null(self::tryFrom($value));
    }
}
