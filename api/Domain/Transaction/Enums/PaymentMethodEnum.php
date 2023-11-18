<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum PaymentMethodEnum: int
{
    case CASH = 0;
    case CARD = 1;
    case CARD_DEBIT = 2;
    case TRANSFER = 3;
    case PIX = 4;
    case OTHER = 5;

    public static function getValues(): array
    {
        return [
            self::CASH,
            self::CARD,
            self::CARD_DEBIT,
            self::TRANSFER,
            self::PIX,
            self::OTHER,
        ];
    }

    public static function random(): PaymentMethodEnum
    {
        $values = self::getValues();
        $randomIndex = array_rand($values);

        return $values[$randomIndex];
    }

    public static function has(int|self $paymentMethod): bool
    {
        if ($paymentMethod instanceof self) {
            return true;
        }

        return ! is_null(self::tryFrom($paymentMethod));
    }
}
