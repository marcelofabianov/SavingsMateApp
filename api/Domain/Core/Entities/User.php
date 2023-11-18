<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Entities;

use Exception;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Core\Exceptions\CoreEntityException;
use SavingsMate\Domain\Interfaces\Core\Dto\ICreateUserDto;
use SavingsMate\Domain\Interfaces\Core\Entities\IUser;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICoreEntityException;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IEmail;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IPassword;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;

final readonly class User extends Entity implements IUser
{
    private function __construct(
        private IUuid $id,
        private string $name,
        private IEmail $email,
        private IPassword $password,
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
            'email' => $this->email->getValue(),
            'password' => $this->password->getValue(),
            'inactivatedAt' => $this->inactivatedAt->format(),
            'deletedAt' => $this->deletedAt->format(),
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ICoreEntityException
     */
    public static function create(ICreateUserDto $dto): IUser
    {
        try {
            return new self(
                id: $dto->id,
                name: $dto->name,
                email: $dto->email,
                password: $dto->password,
                inactivatedAt: $dto->inactivatedAt,
                deletedAt: $dto->deletedAt,
                createdAt: $dto->createdAt,
                updatedAt: $dto->updatedAt,
            );
        } catch (Exception) {
            throw CoreEntityException::InvalidEntity(__CLASS__);
        }
    }
}
