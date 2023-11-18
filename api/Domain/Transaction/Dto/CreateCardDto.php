<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Dto;

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
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateCardDto;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionDtoException;
use SavingsMate\Domain\Transaction\Exceptions\TransactionDtoException;

final readonly class CreateCardDto implements ICreateCardDto
{
    public IUuid $userId;

    public bool $main;

    public string $name;

    public float $limit;

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
        bool $main,
        string $name,
        float $limit,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    ) {
        try {
            $this->userId = $userId;
            $this->main = $main;
            $this->name = $name;
            $this->limit = $limit;
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
