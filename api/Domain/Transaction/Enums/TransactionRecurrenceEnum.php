<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum TransactionRecurrenceEnum: int
{
    case NONE = 0;
    case DAILY = 1;
    case WEEKLY = 2;
    case MONTHLY = 3;
    case YEARLY = 4;

    public static function getValues(): array
    {
        return [
            self::NONE,
            self::DAILY,
            self::WEEKLY,
            self::MONTHLY,
            self::YEARLY,
        ];
    }

    public static function random(): TransactionRecurrenceEnum
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
