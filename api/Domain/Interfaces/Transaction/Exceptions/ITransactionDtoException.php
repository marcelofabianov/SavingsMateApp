<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Exceptions;

use SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException;

interface ITransactionDtoException extends ISavingsMateException
{
    public static function invalid(string $message): self;
}
