<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Exceptions;

use SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException;

interface ITransactionEntityException extends ISavingsMateException
{
    public static function InvalidEntity(string $entity): self;
}
