<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Dto\CreateSupplierDto;
use SavingsMate\Domain\Transaction\Entities\Supplier;

test('Deve criar uma instancia de Supplier com o ICreateSupplierDto', function () {
    $dto = new CreateSupplierDto(
        userId: Uuid::random(),
        name: fake()->name(),
    );

    $supplier = Supplier::create($dto);

    expect($supplier)->toBeInstanceOf(class: Supplier::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Supplier');

test('Deve retornar um array com os valores do Supplier', function () {
    $dto = new CreateSupplierDto(
        userId: Uuid::random(),
        name: fake()->name(),
    );

    $expectedSupplierToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $supplier = Supplier::create($dto);

    expect($supplier->toArray())
        ->toBe($expectedSupplierToArray)
        ->toBeArray();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Supplier');

test('Deve retornar uma string com os valores do Supplier', function () {
    $dto = new CreateSupplierDto(
        userId: Uuid::random(),
        name: fake()->name(),
    );

    $expectedSupplierToArray = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $supplier = Supplier::create($dto);

    expect($supplier->toString())
        ->toBe($expectedSupplierToArray)
        ->toBeString();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Supplier');

test('Deve retornar uma string JSON com os valores do Supplier', function () {
    $dto = new CreateSupplierDto(
        userId: Uuid::random(),
        name: fake()->name(),
    );

    $expectedSupplierToArray = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $supplier = Supplier::create($dto);

    expect($supplier->toJson())
        ->toBe($expectedSupplierToArray)
        ->toBeString()
        ->toBeJson();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Supplier');
