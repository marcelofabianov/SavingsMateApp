<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateSubscriptionDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\ISubscription;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use Throwable;

final readonly class Subscription extends Entity implements ISubscription
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private IUuid $supplierId,
        private IUuid $categoryId,
        private IUuid $cardId,
        private ?string $description,
        private float $price,
        private DateTimeInterface $startDate,
        private DateTimeInterface $endDate,
        private bool $isAutoRenewal,
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
            'price' => $this->price,
            'startDate' => $this->startDate->format('Y-m-d H:i:s'),
            'endDate' => $this->endDate->format('Y-m-d H:i:s'),
            'isAutoRenewal' => $this->isAutoRenewal,
            'inactivatedAt' => $this->inactivatedAt->format(),
            'deletedAt' => $this->deletedAt->format(),
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(ICreateSubscriptionDto $dto): ISubscription
    {
        try {
            return new self(
                id: $dto->id,
                userId: $dto->userId,
                supplierId: $dto->supplierId,
                categoryId: $dto->categoryId,
                cardId: $dto->cardId,
                description: $dto->description,
                price: $dto->price,
                startDate: $dto->startDate,
                endDate: $dto->endDate,
                isAutoRenewal: $dto->isAutoRenewal,
                inactivatedAt: $dto->inactivatedAt,
                deletedAt: $dto->deletedAt,
                createdAt: $dto->createdAt,
                updatedAt: $dto->updatedAt,
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
