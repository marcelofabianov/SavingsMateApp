<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionDtoException;

final class TransactionDtoException extends SavingsMateException implements ITransactionDtoException
{
    public static function invalid(string $message): ITransactionDtoException
    {
        return new self(sprintf('Invalid DTO: %s', $message));
    }
}
