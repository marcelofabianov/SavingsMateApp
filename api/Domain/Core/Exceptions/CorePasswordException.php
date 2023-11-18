<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICorePasswordException;

final class CorePasswordException extends SavingsMateException implements ICorePasswordException
{
    public static function badPassword(): ICorePasswordException
    {
        return new self('It is not a secure password');
    }
}
