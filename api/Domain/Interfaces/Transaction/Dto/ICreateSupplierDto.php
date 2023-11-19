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
 * @property-read string $name
 * @property-read IUuid $id
 * @property-read IInactivatedAt $inactivatedAt
 * @property-read IDeletedAt $deletedAt
 * @property-read ICreatedAt $createdAt
 * @property-read IUpdatedAt $updatedAt
 */
interface ICreateSupplierDto extends IDto
{
    public function __construct(
        IUuid $userId,
        string $name,
        ?IUuid $id,
        ?IInactivatedAt $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    );
}
