<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum CategoryColorEnum: string
{
    case RED = '#FF0000';
    case GREEN = '#00FF00';
    case BLUE = '#0000FF';
    case YELLOW = '#FFFF00';
    case PURPLE = '#800080';
    case ORANGE = '#FFA500';
    case GRAY = '#808080';

    public static function getValues(): array
    {
        return [
            self::RED,
            self::GREEN,
            self::BLUE,
            self::YELLOW,
            self::PURPLE,
            self::ORANGE,
            self::GRAY,
        ];
    }

    public static function random(): CategoryColorEnum
    {
        $values = self::getValues();
        $randomIndex = array_rand($values);

        return $values[$randomIndex];
    }

    public static function has(string|self $value): bool
    {
        if ($value instanceof self) {
            return true;
        }

        return ! is_null(self::tryFrom($value));
    }
}
