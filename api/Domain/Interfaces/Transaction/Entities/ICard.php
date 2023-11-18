<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Entities;

use SavingsMate\Domain\Interfaces\Core\IEntity;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateCardDto;

interface ICard extends IEntity
{
    public static function create(ICreateCardDto $dto): self;
}
