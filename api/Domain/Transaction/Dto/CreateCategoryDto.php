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
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateCategoryDto;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionDtoException;
use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Exceptions\TransactionDtoException;

final readonly class CreateCategoryDto implements ICreateCategoryDto
{
    public IUuid $id;

    public IUuid $userId;

    public string $name;

    public CategoryColorEnum $color;

    public TransactionTypeEnum $type;

    public IInactivatedAt $inactivatedAt;

    public IDeletedAt $deletedAt;

    public ICreatedAt $createdAt;

    public IUpdatedAt $updatedAt;

    /**
     * @throws ITransactionDtoException
     */
    public function __construct(
        IUuid $userId,
        string $name,
        CategoryColorEnum $color,
        TransactionTypeEnum $type,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    ) {
        try {
            $this->userId = $userId;
            $this->name = $name;
            $this->color = $color;
            $this->type = $type;
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
