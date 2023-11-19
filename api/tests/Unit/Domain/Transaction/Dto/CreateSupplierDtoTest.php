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
use SavingsMate\Domain\Transaction\Dto\CreateSupplierDto;

test('Deve criar uma instancia de CreateSupplierDto somente com os dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'name' => fake()->name(),
    ];

    $dto = new CreateSupplierDto(
        $data['userId'],
        $data['name']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Supplier');

test('Deve criar uma instancia de CreateSupplierDto com todos os dados', function () {
    $data = [
        'userId' => Uuid::random(),
        'name' => fake()->name(),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::now(),
        'deletedAt' => DeletedAt::now(),
        'createdAt' => CreatedAt::now(),
        'updatedAt' => UpdatedAt::now(),
    ];

    $dto = new CreateSupplierDto(
        $data['userId'],
        $data['name'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Supplier');
