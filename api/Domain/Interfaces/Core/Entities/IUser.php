<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\Entities;

use SavingsMate\Domain\Interfaces\Core\Dto\ICreateUserDto;
use SavingsMate\Domain\Interfaces\Core\IEntity;

interface IUser extends IEntity
{
    public static function create(ICreateUserDto $dto): self;
}
