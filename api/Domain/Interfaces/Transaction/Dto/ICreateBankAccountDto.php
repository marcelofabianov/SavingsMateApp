<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Dto;

use SavingsMate\Domain\Interfaces\Core\IDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;

interface ICreateBankAccountDto extends IDto
{
    public function __construct(
        bool $main,
        string $name,
        ?string $description = null,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    );
}
