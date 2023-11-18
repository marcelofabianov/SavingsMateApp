<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core;

use JsonException;
use SavingsMate\Domain\Interfaces\Core\IEntity;

abstract readonly class Entity implements IEntity
{
    abstract public function toArray(): array;

    /**
     * @throws JsonException
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @throws JsonException
     */
    public function toString(): string
    {
        return $this->__toString();
    }

    /**
     * @throws JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }
}
