<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Transaction\Entities\IBankAccount;
use SavingsMate\Domain\Transaction\Dto\CreateBankAccountDto;
use SavingsMate\Domain\Transaction\Entities\BankAccount;

test('Deve criar uma instancia de BankAccount com o ICreateBankAccountDto', function () {
    $dto = new CreateBankAccountDto(
        userId: Uuid::random(),
        main: fake()->boolean(),
        agencyIdentifier: (string) fake()->randomNumber(4),
        accountIdentifier: (string) fake()->randomNumber(6),
        name: fake()->company(),
        initialBalance: fake()->randomFloat(2, 0, 1000)
    );

    $bankAccount = BankAccount::create($dto);

    expect($bankAccount)->toBeInstanceOf(IBankAccount::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'BankAccount');

test('Deve retornar um array com os valores do BankAccount', function () {
    $dto = new CreateBankAccountDto(
        userId: Uuid::random(),
        main: fake()->boolean(),
        agencyIdentifier: (string) fake()->randomNumber(4),
        accountIdentifier: (string) fake()->randomNumber(6),
        name: fake()->company(),
        initialBalance: fake()->randomFloat(2, 0, 1000)
    );

    $expectedBankAccountToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'main' => $dto->main,
        'agencyIdentifier' => $dto->agencyIdentifier,
        'accountIdentifier' => $dto->accountIdentifier,
        'initialBalance' => $dto->initialBalance,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $bankAccount = BankAccount::create($dto);

    expect($bankAccount->toArray())->toBeArray()
        ->toEqual($expectedBankAccountToArray);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'BankAccount');

test('Deve retornar uma string com os valores do BankAccount', function () {
    $dto = new CreateBankAccountDto(
        userId: Uuid::random(),
        main: fake()->boolean(),
        agencyIdentifier: (string) fake()->randomNumber(4),
        accountIdentifier: (string) fake()->randomNumber(6),
        name: fake()->company(),
        initialBalance: fake()->randomFloat(2, 0, 1000)
    );

    $expectedBankAccountToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'main' => $dto->main,
        'agencyIdentifier' => $dto->agencyIdentifier,
        'accountIdentifier' => $dto->accountIdentifier,
        'initialBalance' => $dto->initialBalance,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $bankAccount = BankAccount::create($dto);

    expect($bankAccount->toString())->toBeString()
        ->toEqual($expectedBankAccountToString);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'BankAccount');

test('Deve retornar uma string json com os valores do BankAccount', function () {
    $dto = new CreateBankAccountDto(
        userId: Uuid::random(),
        main: fake()->boolean(),
        agencyIdentifier: (string) fake()->randomNumber(4),
        accountIdentifier: (string) fake()->randomNumber(6),
        name: fake()->company(),
        initialBalance: fake()->randomFloat(2, 0, 1000)
    );

    $expectedBankAccountToJson = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'main' => $dto->main,
        'agencyIdentifier' => $dto->agencyIdentifier,
        'accountIdentifier' => $dto->accountIdentifier,
        'initialBalance' => $dto->initialBalance,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $bankAccount = BankAccount::create($dto);

    expect($bankAccount->toJson())->toBeString()
        ->toEqual($expectedBankAccountToJson);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'BankAccount');
