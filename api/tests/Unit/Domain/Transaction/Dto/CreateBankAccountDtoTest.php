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
        'main' => fake()->boolean(),
        'name' => fake()->company(),
    ];

    $dto = new CreateBankAccountDto(
        $data['main'],
        $data['name']
    );

    expect($dto->main)->toBe($data['main'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->description)->toBeNull()
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'BankAccount');

test('Deve criar um instancia de CreateBankAccountDto com todos os dados', function () {
    $data = [
        'main' => fake()->boolean(),
        'name' => fake()->company(),
        'description' => fake()->text(),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateBankAccountDto(
        $data['main'],
        $data['name'],
        $data['description'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    expect($dto->main)->toBe($data['main'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'BankAccount');
