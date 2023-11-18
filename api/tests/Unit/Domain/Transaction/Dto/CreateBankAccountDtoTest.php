<?php

declare(strict_types=1);

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
use SavingsMate\Domain\Transaction\Dto\CreateBankAccountDto;

test('Deve criar um instancia de CreateBankAccountDto somente com os dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'main' => fake()->boolean(),
        'name' => fake()->company(),
        'initialBalance' => fake()->randomFloat(2, 0, 1000),
    ];

    $dto = new CreateBankAccountDto(
        $data['userId'],
        $data['main'],
        $data['name'],
        $data['initialBalance']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->main)->toBe($data['main'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->initialBalance)->toBe($data['initialBalance'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'BankAccount');

test('Deve criar um instancia de CreateBankAccountDto com todos os dados', function () {
    $data = [
        'userId' => Uuid::random(),
        'main' => fake()->boolean(),
        'name' => fake()->company(),
        'initialBalance' => fake()->randomFloat(2, 0, 1000),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateBankAccountDto(
        $data['userId'],
        $data['main'],
        $data['name'],
        $data['initialBalance'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->main)->toBe($data['main'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->initialBalance)->toBe($data['initialBalance'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'BankAccount');
