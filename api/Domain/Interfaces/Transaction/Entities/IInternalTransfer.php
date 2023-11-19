<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Entities;

use SavingsMate\Domain\Interfaces\Core\IEntity;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateInternalTransferDto;

interface IInternalTransfer extends IEntity
{
    public static function create(ICreateInternalTransferDto $dto): self;
}
