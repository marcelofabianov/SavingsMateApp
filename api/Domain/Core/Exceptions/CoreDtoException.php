<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICoreDtoException;

final class CoreDtoException extends SavingsMateException implements ICoreDtoException
{
    public static function invalid(string $message): ICoreDtoException
    {
        return new self(sprintf('Invalid DTO: %s', $message));
    }
}
