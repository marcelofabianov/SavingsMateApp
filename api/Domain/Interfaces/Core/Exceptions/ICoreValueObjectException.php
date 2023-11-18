<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\Exceptions;

use SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException;

interface ICoreValueObjectException extends ISavingsMateException
{
    public static function invalidValue(string $valueObject, ?string $value = null): self;
}
