<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Dto\CreateInstallmentDto;
use SavingsMate\Domain\Transaction\Entities\Installment;

test('Deve criar uma instancia de Installment com o ICreateInstallmentDto', function () {
    $dto = new CreateInstallmentDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        totalAmount: fake()->randomFloat(2, 0, 1000),
        installmentValue: fake()->randomFloat(2, 0, 1000),
        numberOfInstallments: fake()->numberBetween(1, 12),
        dayOfPayment: fake()->numberBetween(1, 28),
        hasInterestAdded: fake()->boolean(),
        description: fake()->text(100),
    );

    $installment = Installment::create($dto);

    expect($installment)->toBeInstanceOf(Installment::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Installment');

test('Deve retornar um array com os valores do Installment', function () {
    $dto = new CreateInstallmentDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        totalAmount: fake()->randomFloat(2, 0, 1000),
        installmentValue: fake()->randomFloat(2, 0, 1000),
        numberOfInstallments: fake()->numberBetween(1, 12),
        dayOfPayment: fake()->numberBetween(1, 28),
        hasInterestAdded: fake()->boolean(),
        description: fake()->text(100),
    );

    $expectedInstallmentToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'cardId' => $dto->cardId->getValue(),
        'description' => $dto->description,
        'totalAmount' => $dto->totalAmount,
        'installmentValue' => $dto->installmentValue,
        'numberOfInstallments' => $dto->numberOfInstallments,
        'dayOfPayment' => $dto->dayOfPayment,
        'hasInterestAdded' => $dto->hasInterestAdded,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $installment = Installment::create($dto);

    expect($installment->toArray())->toBeArray()
        ->toEqual($expectedInstallmentToArray);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Installment');

test('Deve retornar uma string com os valores do Installment', function () {
    $dto = new CreateInstallmentDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        totalAmount: fake()->randomFloat(2, 0, 1000),
        installmentValue: fake()->randomFloat(2, 0, 1000),
        numberOfInstallments: fake()->numberBetween(1, 12),
        dayOfPayment: fake()->numberBetween(1, 28),
        hasInterestAdded: fake()->boolean(),
        description: fake()->text(100),
    );

    $expectedInstallmentToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'cardId' => $dto->cardId->getValue(),
        'description' => $dto->description,
        'totalAmount' => $dto->totalAmount,
        'installmentValue' => $dto->installmentValue,
        'numberOfInstallments' => $dto->numberOfInstallments,
        'dayOfPayment' => $dto->dayOfPayment,
        'hasInterestAdded' => $dto->hasInterestAdded,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $installment = Installment::create($dto);

    expect($installment->toString())->toBeString()
        ->toEqual($expectedInstallmentToString);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Installment');

test('Deve retornar uma string json com os valores do Installment', function () {
    $dto = new CreateInstallmentDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        totalAmount: fake()->randomFloat(2, 0, 1000),
        installmentValue: fake()->randomFloat(2, 0, 1000),
        numberOfInstallments: fake()->numberBetween(1, 12),
        dayOfPayment: fake()->numberBetween(1, 28),
        hasInterestAdded: fake()->boolean(),
        description: fake()->text(100),
    );

    $expectedInstallmentToJson = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'cardId' => $dto->cardId->getValue(),
        'description' => $dto->description,
        'totalAmount' => $dto->totalAmount,
        'installmentValue' => $dto->installmentValue,
        'numberOfInstallments' => $dto->numberOfInstallments,
        'dayOfPayment' => $dto->dayOfPayment,
        'hasInterestAdded' => $dto->hasInterestAdded,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $installment = Installment::create($dto);

    expect($installment->toJson())
        ->toBeString()
        ->toBeJson()
        ->toEqual($expectedInstallmentToJson);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Installment');
