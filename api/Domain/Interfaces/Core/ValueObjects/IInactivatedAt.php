<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\ValueObjects;

use DateTimeInterface;
use SavingsMate\Domain\Interfaces\Core\IDateTime;
use SavingsMate\Domain\Interfaces\Core\INullable;
use SavingsMate\Domain\Interfaces\Core\IValueObject;

interface IInactivatedAt extends IValueObject, INullable, IDateTime
{
    public static function random(): self;

    public static function now(): self;

    public static function create(string|null|DateTimeInterface $value): self;
}
