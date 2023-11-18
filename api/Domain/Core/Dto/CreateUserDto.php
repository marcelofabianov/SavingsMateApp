<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\Dto;

use Exception;
use SavingsMate\Domain\Core\Exceptions\CoreDtoException;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\DeletedAt;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Core\ValueObjects\Password;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Core\Dto\ICreateUserDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IEmail;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IPassword;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;

final readonly class CreateUserDto implements ICreateUserDto
{
    public string $name;

    public IEmail $email;

    public IPassword $password;

    public IUuid $id;

    public IInactivatedAt $inactivatedAt;

    public IDeletedAt $deletedAt;

    public ICreatedAt $createdAt;

    public IUpdatedAt $updatedAt;

    /**
     * @throws Exception
     */
    public function __construct(
        string $name,
        IEmail $email,
        ?IPassword $password = null,
        ?IUuid $id = null,
        ?IInactivatedAt $inactivatedAt = null,
        ?IDeletedAt $deletedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    ) {
        try {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password ?? Password::random();
            $this->id = $id ?? Uuid::random();
            $this->inactivatedAt = $inactivatedAt ?? InactivatedAt::nullable();
            $this->deletedAt = $deletedAt ?? DeletedAt::nullable();
            $this->createdAt = $createdAt ?? CreatedAt::now();
            $this->updatedAt = $updatedAt ?? UpdatedAt::now();
        } catch (Exception $exception) {
            throw CoreDtoException::invalid($exception->getMessage());
        }
    }
}
