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
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateCardDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\ICard;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;
use SavingsMate\Domain\Transaction\Enums\CardScopeEnum;
use SavingsMate\Domain\Transaction\Enums\CardTypeEnum;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use Throwable;

final readonly class Card extends Entity implements ICard
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private string $name,
        private bool $main,
        private string $lastFourDigits,
        private float $limit,
        private init $billingCycleDay,
        private DateTimeInterface $expirationDate,
        private CardTypeEnum $type,
        private CardScopeEnum $scope,
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
            'name' => $this->name,
            'main' => $this->main,
            'lastFourDigits' => $this->lastFourDigits,
            'limit' => $this->limit,
            'type' => $this->type->value,
            'scope' => $this->scope->value,
            'inactivatedAt' => $this->inactivatedAt->format(),
            'deletedAt' => $this->deletedAt->format(),
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(ICreateCardDto $dto): ICard
    {
        try {
            return new self(
                id: $dto->id,
                userId: $dto->userId,
                name: $dto->name,
                main: $dto->main,
                lastFourDigits: $dto->lastFourDigits,
                limit: $dto->limit,
                type: $dto->type,
                scope: $dto->scope,
                inactivatedAt: $dto->inactivatedAt,
                deletedAt: $dto->deletedAt,
                createdAt: $dto->createdAt,
                updatedAt: $dto->updatedAt
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
