<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionStatusEnum: int
{
    case PENDING = 0;
    case CONFIRMED = 1;
    case CANCELLED = 2;
    case REVERSED = 3;

    public static function getValues(): array
    {
        return [
            self::PENDING,
            self::CONFIRMED,
            self::CANCELLED,
            self::REVERSED,
        ];
    }

    public static function random(): TransactionStatusEnum
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
