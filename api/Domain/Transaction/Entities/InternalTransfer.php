<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateInternalTransferDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\IInternalTransfer;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use Throwable;

final readonly class InternalTransfer extends Entity implements IInternalTransfer
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private IUuid $sourceAccountId,
        private IUuid $destinationAccountId,
        private float $amount,
        private string $description,
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
            'sourceAccountId' => $this->sourceAccountId->getValue(),
            'destinationAccountId' => $this->destinationAccountId->getValue(),
            'amount' => $this->amount,
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
    public static function create(ICreateInternalTransferDto $dto): IInternalTransfer
    {
        try {
            return new self(
                $dto->id,
                $dto->userId,
                $dto->sourceAccountId,
                $dto->destinationAccountId,
                $dto->amount,
                $dto->description,
                $dto->inactivatedAt,
                $dto->deletedAt,
                $dto->createdAt,
                $dto->updatedAt
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
