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
        private string $name,
        private bool $main,
        private ?string $description,
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
            'name' => $this->name,
            'main' => $this->main,
            'description' => $this->description,
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
                name: $dto->name,
                main: $dto->main,
                description: $dto->description,
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
