<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Dto;

use SavingsMate\Domain\Interfaces\Core\IDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;

/**
 * @property-read IUuid $userId
 * @property-read bool $main
 * @property-read string $agencyIdentifier
 * @property-read string $accountIdentifier
 * @property-read string $name
 * @property-read float $balance
 * @property-read IUuid $id
 * @property-read IInactivatedAt $inactivatedAt
 * @property-read IDeletedAt $deletedAt
 * @property-read ICreatedAt $createdAt
 * @property-read IUpdatedAt $updatedAt
 */
interface ICreateBankAccountDto extends IDto
{
    public function __construct(
        IUuid $userId,
        bool $main,
        string $agencyIdentifier,
        string $accountIdentifier,
        string $name,
        float $balance,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    );
}
