<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core;

interface INullable
{
    public function isNull(): bool;

    public function isNotNull(): bool;

    public static function nullable(): mixed;
}
