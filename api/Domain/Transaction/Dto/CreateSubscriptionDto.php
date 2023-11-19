<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Dto;

use DateTimeInterface;
use Exception;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateSubscriptionDto;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionDtoException;
use SavingsMate\Domain\Transaction\Exceptions\TransactionDtoException;

final readonly class CreateSubscriptionDto implements ICreateSubscriptionDto
{
    public IUuid $userId;

    public IUuid $supplierId;

    public IUuid $categoryId;

    public IUuid $cardId;

    public float $price;

    public DateTimeInterface $startDate;

    public DateTimeInterface $endDate;

    public bool $isAutoRenewal;

    public string $description;

    public IUuid $id;

    public IInactivatedAt $inactivatedAt;

    public IDeletedAt $deletedAt;

    public ICreatedAt $createdAt;

    public IUpdatedAt $updatedAt;

    /**
     * @throws ITransactionDtoException
     */
    public function __construct(
        IUuid $userId,
        IUuid $supplierId,
        IUuid $categoryId,
        IUuid $cardId,
        float $price,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        bool $isAutoRenewal,
        string $description,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    ) {
        try {
            $this->userId = $userId;
            $this->supplierId = $supplierId;
            $this->categoryId = $categoryId;
            $this->cardId = $cardId;
            $this->price = $price;
            $this->startDate = $startDate;
            $this->endDate = $endDate;
            $this->isAutoRenewal = $isAutoRenewal;
            $this->description = $description;
            $this->id = $id ?? Uuid::random();
            $this->inactivatedAt = $inactivatedAt ?? InactivatedAt::nullable();
            $this->deletedAt = $deletedAt ?? DeletedAt::nullable();
            $this->createdAt = $createdAt ?? CreatedAt::now();
            $this->updatedAt = $updatedAt ?? UpdatedAt::now();
        } catch (Exception $exception) {
            throw TransactionDtoException::invalid($exception->getMessage());
        }
    }
}
