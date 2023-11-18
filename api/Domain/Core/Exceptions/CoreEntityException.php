<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Exceptions;

use SavingsMate\Domain\Exceptions\SavingsMateException;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICoreEntityException;

final class CoreEntityException extends SavingsMateException implements ICoreEntityException
{
    public static function InvalidEntity(string $entity): ICoreEntityException
    {
        return new self(sprintf('Invalid entity: %s', $entity));
    }
}
