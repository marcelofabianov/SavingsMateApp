<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;

final class TransactionEntityException extends SavingsMateException implements ITransactionEntityException
{
    public static function InvalidEntity(string $entity): ITransactionEntityException
    {
        return new self(sprintf('Invalid entity: %s', $entity));
    }
}
