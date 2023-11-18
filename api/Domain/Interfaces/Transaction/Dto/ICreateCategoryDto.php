<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Dto;

use SavingsMate\Domain\Interfaces\Core\IDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;

/**
 * @property-read IUuid $id
 * @property-read IUuid $userId
 * @property-read string $name
 * @property-read CategoryColorEnum $color
 * @property-read TransactionTypeEnum $type
 * @property-read IInactivatedAt $inactivatedAt
 * @property-read IDeletedAt $deletedAt
 * @property-read ICreatedAt $createdAt
 * @property-read IUpdatedAt $updatedAt
 */
interface ICreateCategoryDto extends IDto
{
    public function __construct(
        IUuid $userId,
        string $name,
        CategoryColorEnum $color,
        TransactionTypeEnum $type,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    );
}
