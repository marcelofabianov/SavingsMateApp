<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core;

interface IValueObject
{
    public function __toString(): string;

    public function toString(): string;
}
