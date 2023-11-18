<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Dto\CreateInternalTransferDto;
use SavingsMate\Domain\Transaction\Entities\InternalTransfer;

test('Deve criar uma instancia de InternalTransfer com o ICreateInternalTransferDto', function () {
    $dto = new CreateInternalTransferDto(
        userId: Uuid::random(),
        sourceAccountId: Uuid::random(),
        destinationAccountId: Uuid::random(),
        amount: fake()->randomFloat(2, 0, 1000),
        description: fake()->text(100),
    );

    $internalTransfer = InternalTransfer::create($dto);

    expect($internalTransfer)->toBeInstanceOf(InternalTransfer::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'InternalTransfer');

test('Deve retornar um array com os valores do InternalTransfer', function () {
    $dto = new CreateInternalTransferDto(
        userId: Uuid::random(),
        sourceAccountId: Uuid::random(),
        destinationAccountId: Uuid::random(),
        amount: fake()->randomFloat(2, 0, 1000),
        description: fake()->text(100),
    );

    $expectedInternalTransferToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'sourceAccountId' => $dto->sourceAccountId->getValue(),
        'destinationAccountId' => $dto->destinationAccountId->getValue(),
        'amount' => $dto->amount,
        'description' => $dto->description,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $internalTransfer = InternalTransfer::create($dto);

    expect($internalTransfer->toArray())->toBe($expectedInternalTransferToArray);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'InternalTransfer');

test('Deve retornar uma string com os valores do InternalTransfer', function () {
    $dto = new CreateInternalTransferDto(
        userId: Uuid::random(),
        sourceAccountId: Uuid::random(),
        destinationAccountId: Uuid::random(),
        amount: fake()->randomFloat(2, 0, 1000),
        description: fake()->text(100),
    );

    $expectedInternalTransferToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'sourceAccountId' => $dto->sourceAccountId->getValue(),
        'destinationAccountId' => $dto->destinationAccountId->getValue(),
        'amount' => $dto->amount,
        'description' => $dto->description,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $internalTransfer = InternalTransfer::create($dto);

    expect($internalTransfer->toString())
        ->toBe($expectedInternalTransferToString)
        ->toBeString();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'InternalTransfer');

test('Deve retornar uma string JSON com os valores InternalTransfer', function () {
    $dto = new CreateInternalTransferDto(
        userId: Uuid::random(),
        sourceAccountId: Uuid::random(),
        destinationAccountId: Uuid::random(),
        amount: fake()->randomFloat(2, 0, 1000),
        description: fake()->text(100),
    );

    $expectedInternalTransferToJson = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'sourceAccountId' => $dto->sourceAccountId->getValue(),
        'destinationAccountId' => $dto->destinationAccountId->getValue(),
        'amount' => $dto->amount,
        'description' => $dto->description,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $internalTransfer = InternalTransfer::create($dto);

    expect($internalTransfer->toJson())
        ->toBe($expectedInternalTransferToJson)
        ->toBeString()
        ->toBeJson();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'InternalTransfer');
