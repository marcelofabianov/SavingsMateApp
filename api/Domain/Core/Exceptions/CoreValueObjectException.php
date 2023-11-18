<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICoreValueObjectException;

final class CoreValueObjectException extends SavingsMateException implements ICoreValueObjectException
{
    public static function invalidValue(string $valueObject, ?string $value = null): ICoreValueObjectException
    {
        return new self(sprintf('Invalid value for %s: %s', $valueObject, $value ?? ''));
    }
}
