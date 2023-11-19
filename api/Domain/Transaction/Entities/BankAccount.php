<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateBankAccountDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\IBankAccount;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use Throwable;

final readonly class BankAccount extends Entity implements IBankAccount
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private string $name,
        private bool $main,
        private string $agencyIdentifier,
        private string $accountIdentifier,
        private float $balance,
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
            'agencyIdentifier' => $this->agencyIdentifier,
            'accountIdentifier' => $this->accountIdentifier,
            'balance' => $this->balance,
            'inactivatedAt' => $this->inactivatedAt->format(),
            'deletedAt' => $this->deletedAt->format(),
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(ICreateBankAccountDto $dto): IBankAccount
    {
        try {
            return new self(
                id: $dto->id,
                userId: $dto->userId,
                name: $dto->name,
                main: $dto->main,
                agencyIdentifier: $dto->agencyIdentifier,
                accountIdentifier: $dto->accountIdentifier,
                balance: $dto->balance,
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
