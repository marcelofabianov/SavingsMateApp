<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core;

abstract class ValueObject
{
    abstract public function __toString(): string;

    public function toString(): string
    {
        return $this->__toString();
    }
}
