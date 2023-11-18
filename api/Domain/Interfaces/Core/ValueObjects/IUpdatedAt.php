<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\ValueObjects;

use DateTimeInterface;
use SavingsMate\Domain\Interfaces\Core\IDateTime;
use SavingsMate\Domain\Interfaces\Core\IValueObject;

interface IUpdatedAt extends IValueObject, IDateTime
{
    public static function now(): self;

    public static function random(): self;

    public static function create(string|DateTimeInterface $value): self;
}
