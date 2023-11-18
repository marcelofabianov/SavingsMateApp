<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\ValueObjects;

use DateTimeInterface;
use SavingsMate\Domain\Interfaces\Core\INullable;
use SavingsMate\Domain\Interfaces\Core\IValueObject;

interface IDeletedAt extends IValueObject, INullable
{
    public function getValue(): ?DateTimeInterface;

    public function toIso8601(): string|null;

    public function format(string $format): string|null;

    public static function nullable(): self;

    public static function random(): self;

    public static function now(): self;
}
