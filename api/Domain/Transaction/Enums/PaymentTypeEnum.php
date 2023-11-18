<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum PaymentTypeEnum: int
{
    case SINGLE = 0;
    case INSTALLMENTS = 1;
    case SUBSCRIPTION = 2;

    public static function getValues(): array
    {
        return [
            self::SINGLE,
            self::INSTALLMENTS,
            self::SUBSCRIPTION,
        ];
    }

    public static function random(): PaymentTypeEnum
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
