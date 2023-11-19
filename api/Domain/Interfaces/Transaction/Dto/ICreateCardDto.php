<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Dto;

use SavingsMate\Domain\Interfaces\Core\IDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Transaction\Enums\CardScopeEnum;
use SavingsMate\Domain\Transaction\Enums\CardTypeEnum;

/**
 * @property-read IUuid $userId
 * @property-read bool $main
 * @property-read string $lastFourDigits
 * @property-read string $name
 * @property-read float $limit
 * @property-read CardTypeEnum $type
 * @property-read CardScopeEnum $scope
 * @property-read IUuid $id
 * @property-read IInactivatedAt $inactivatedAt
 * @property-read IDeletedAt $deletedAt
 * @property-read ICreatedAt $createdAt
 * @property-read IUpdatedAt $updatedAt
 */
interface ICreateCardDto extends IDto
{
    public function __construct(
        IUuid $userId,
        bool $main,
        string $lastFourDigits,
        string $name,
        float $limit,
        CardTypeEnum $type,
        CardScopeEnum $scope,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    );
}
