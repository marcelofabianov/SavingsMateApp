<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionTypeEnum: int
{
    case INCOME = 1;
    case EXPENSE = 0;

    public static function getValues(): array
    {
        return [
            self::INCOME,
            self::EXPENSE,
        ];
    }

    public static function random(): TransactionTypeEnum
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
