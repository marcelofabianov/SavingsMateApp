<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\Exceptions;

use SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException;

interface ICoreEntityException extends ISavingsMateException
{
    public static function InvalidEntity(string $entity): self;
}
