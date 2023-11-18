<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Core\Dto;

use SavingsMate\Domain\Interfaces\Core\IDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IEmail;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IPassword;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;

interface ICreateUserDto extends IDto
{
    public function __construct(
        string $name,
        IEmail $email,
        ?IPassword $password,
        ?IUuid $id,
        ?IInactivatedAt $inactivatedAt,
        ?IDeletedAt $deletedAt,
        ?ICreatedAt $createdAt,
        ?IUpdatedAt $updatedAt
    );
}
