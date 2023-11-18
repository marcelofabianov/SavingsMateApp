<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\Exceptions;

use SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException;

interface ICorePasswordException extends ISavingsMateException
{
    public static function badPassword(string $message, string $value): self;
}
