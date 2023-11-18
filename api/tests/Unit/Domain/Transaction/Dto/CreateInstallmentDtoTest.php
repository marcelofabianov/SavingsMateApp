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
use SavingsMate\Domain\Transaction\Dto\CreateInstallmentDto;

test('Deve criar uma instancia de CreateInstallmentDto somente com so dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'supplierId' => Uuid::random(),
        'categoryId' => Uuid::random(),
        'cardId' => Uuid::random(),
        'totalAmount' => fake()->randomFloat(2, 1, 1000),
        'installmentValue' => fake()->randomFloat(2, 1, 1000),
        'numberOfInstallments' => fake()->numberBetween(1, 12),
        'dayOfPayment' => fake()->numberBetween(1, 28),
        'hasInterestAdded' => fake()->boolean(),
        'description' => fake()->text(),
    ];

    $dto = new CreateInstallmentDto(
        $data['userId'],
        $data['supplierId'],
        $data['categoryId'],
        $data['cardId'],
        $data['totalAmount'],
        $data['installmentValue'],
        $data['numberOfInstallments'],
        $data['dayOfPayment'],
        $data['hasInterestAdded'],
        $data['description']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->supplierId)->toBe($data['supplierId'])
        ->and($dto->categoryId)->toBe($data['categoryId'])
        ->and($dto->cardId)->toBe($data['cardId'])
        ->and($dto->totalAmount)->toBe($data['totalAmount'])
        ->and($dto->installmentValue)->toBe($data['installmentValue'])
        ->and($dto->numberOfInstallments)->toBe($data['numberOfInstallments'])
        ->and($dto->dayOfPayment)->toBe($data['dayOfPayment'])
        ->and($dto->hasInterestAdded)->toBe($data['hasInterestAdded'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Installment');

test('Deve criar uma instancia de CreateInstallmentDto com todos os campos', function () {
    $data = [
        'userId' => Uuid::random(),
        'supplierId' => Uuid::random(),
        'categoryId' => Uuid::random(),
        'cardId' => Uuid::random(),
        'totalAmount' => fake()->randomFloat(2, 1, 1000),
        'installmentValue' => fake()->randomFloat(2, 1, 1000),
        'numberOfInstallments' => fake()->numberBetween(1, 12),
        'dayOfPayment' => fake()->numberBetween(1, 28),
        'hasInterestAdded' => fake()->boolean(),
        'description' => fake()->text(),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateInstallmentDto(
        $data['userId'],
        $data['supplierId'],
        $data['categoryId'],
        $data['cardId'],
        $data['totalAmount'],
        $data['installmentValue'],
        $data['numberOfInstallments'],
        $data['dayOfPayment'],
        $data['hasInterestAdded'],
        $data['description'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->supplierId)->toBe($data['supplierId'])
        ->and($dto->categoryId)->toBe($data['categoryId'])
        ->and($dto->cardId)->toBe($data['cardId'])
        ->and($dto->totalAmount)->toBe($data['totalAmount'])
        ->and($dto->installmentValue)->toBe($data['installmentValue'])
        ->and($dto->numberOfInstallments)->toBe($data['numberOfInstallments'])
        ->and($dto->dayOfPayment)->toBe($data['dayOfPayment'])
        ->and($dto->hasInterestAdded)->toBe($data['hasInterestAdded'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Installment');
