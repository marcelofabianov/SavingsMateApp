<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use Exception;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\Exceptions\CoreEntityException;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICoreEntityException;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateCategoryDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\ICategory;
use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;

final readonly class Category extends Entity implements ICategory
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private string $name,
        private CategoryColorEnum $color,
        private TransactionTypeEnum $type,
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
            'color' => $this->color->value,
            'type' => $this->type->value,
            'inactivatedAt' => $this->inactivatedAt->format(),
            'deletedAt' => $this->deletedAt->format(),
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ICoreEntityException
     */
    public static function create(ICreateCategoryDto $dto): ICategory
    {
        try {
            return new self(
                id: $dto->id,
                userId: $dto->userId,
                name: $dto->name,
                color: $dto->color,
                type: $dto->type,
                inactivatedAt: $dto->inactivatedAt,
                deletedAt: $dto->deletedAt,
                createdAt: $dto->createdAt,
                updatedAt: $dto->updatedAt
            );
        } catch (Exception) {
            throw CoreEntityException::InvalidEntity(__CLASS__);
        }
    }
}
