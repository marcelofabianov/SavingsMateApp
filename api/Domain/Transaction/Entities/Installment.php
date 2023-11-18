<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use SavingsMate\Domain\Core\Entity;
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
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateInstallmentDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\IInstallment;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use Throwable;

final readonly class Installment extends Entity implements IInstallment
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private IUuid $supplierId,
        private IUuid $categoryId,
        private IUuid $cardId,
        private ?string $description,
        private float $totalAmount,
        private float $installmentValue,
        private int $numberOfInstallments,
        private int $dayOfPayment,
        private bool $hasInterestAdded,
        private IInactivatedAt $inactivatedAt,
        private IDeletedAt $deletedAt,
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'userId' => $this->userId->getValue(),
            'supplierId' => $this->supplierId->getValue(),
            'categoryId' => $this->categoryId->getValue(),
            'cardId' => $this->cardId->getValue(),
            'description' => $this->description,
            'totalAmount' => $this->totalAmount,
            'installmentValue' => $this->installmentValue,
            'numberOfInstallments' => $this->numberOfInstallments,
            'dayOfPayment' => $this->dayOfPayment,
            'hasInterestAdded' => $this->hasInterestAdded,
            'inactivatedAt' => $this->inactivatedAt->format(),
            'deletedAt' => $this->deletedAt->format(),
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(ICreateInstallmentDto $dto): IInstallment
    {
        try {
            return new self(
                id: $dto->id ?? Uuid::random(),
                userId: $dto->userId,
                supplierId: $dto->supplierId,
                categoryId: $dto->categoryId,
                cardId: $dto->cardId,
                description: $dto->description,
                totalAmount: $dto->totalAmount,
                installmentValue: $dto->installmentValue,
                numberOfInstallments: $dto->numberOfInstallments,
                dayOfPayment: $dto->dayOfPayment,
                hasInterestAdded: $dto->hasInterestAdded,
                inactivatedAt: $dto->inactivatedAt ?? InactivatedAt::nullable(),
                deletedAt: $dto->deletedAt ?? DeletedAt::nullable(),
                createdAt: $dto->createdAt ?? CreatedAt::now(),
                updatedAt: $dto->updatedAt ?? UpdatedAt::now(),
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
