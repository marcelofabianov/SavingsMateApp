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
 * @property-read IUuid $supplierId
 * @property-read IUuid $categoryId
 * @property-read IUuid $cardId
 * @property-read float $totalAmount
 * @property-read float $installmentValue
 * @property-read int $numberOfInstallments
 * @property-read int $dayOfPayment
 * @property-read bool $hasInterestAdded
 * @property-read string $description
 * @property-read IUuid $id
 * @property-read IInactivatedAt $inactivatedAt
 * @property-read IDeletedAt $deletedAt
 * @property-read ICreatedAt $createdAt
 * @property-read IUpdatedAt $updatedAt
 */
interface ICreateInstallmentDto extends IDto
{
    public function __construct(
        IUuid $userId,
        IUuid $supplierId,
        IUuid $categoryId,
        IUuid $cardId,
        float $totalAmount,
        float $installmentValue,
        int $numberOfInstallments,
        int $dayOfPayment,
        bool $hasInterestAdded,
        string $description,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null,
    );
}
