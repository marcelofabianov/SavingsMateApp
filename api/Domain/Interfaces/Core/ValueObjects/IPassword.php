<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\ValueObjects;

use SavingsMate\Domain\Interfaces\Core\IValueObject;

interface IPassword extends IValueObject
{
    public function getValue(): string;

    public function equals(self $other): bool;

    public static function random(): self;

    public static function validate(string $value): bool;

    public static function create(string|self $value): self;
}
