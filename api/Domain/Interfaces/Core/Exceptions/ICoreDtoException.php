<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\Exceptions;

interface ICoreDtoException
{
    public static function invalid(string $message): self;
}
