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
use SavingsMate\Domain\Transaction\Dto\CreateCategoryDto;
use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;

test('Deve criar uma instancia de CreateCategoryDto somente com so dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'name' => fake()->company(),
        'color' => CategoryColorEnum::random(),
        'type' => TransactionTypeEnum::random(),
    ];

    $dto = new CreateCategoryDto(
        $data['userId'],
        $data['name'],
        $data['color'],
        $data['type']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->color)->toBe($data['color'])
        ->and($dto->type)->toBe($data['type'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Category');

test('Deve criar uma instancia de CreateCategoryDto com todos os campos', function () {
    $data = [
        'userId' => Uuid::random(),
        'name' => fake()->company(),
        'color' => CategoryColorEnum::random(),
        'type' => TransactionTypeEnum::random(),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateCategoryDto(
        $data['userId'],
        $data['name'],
        $data['color'],
        $data['type'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->color)->toBe($data['color'])
        ->and($dto->type)->toBe($data['type'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Category');
