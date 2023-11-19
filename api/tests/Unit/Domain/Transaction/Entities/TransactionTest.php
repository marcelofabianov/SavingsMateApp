<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Dto\CreateTransactionDto;
use SavingsMate\Domain\Transaction\Entities\Transaction;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;

test('Deve criar uma instancia de Transaction com ICreateTransactionDto', function () {
    $dto = new CreateTransactionDto(
        userId: Uuid::random(),
        categoryId: Uuid::random(),
        supplierId: Uuid::random(),
        cardId: Uuid::random(),
        bankAccountId: Uuid::random(),
        installmentId: Uuid::random(),
        subscriptionId: Uuid::random(),
        internalTransferId: Uuid::random(),
        amount: fake()->randomFloat(),
        description: fake()->sentence(),
        paymentMethod: PaymentMethodEnum::random(),
        paymentType: PaymentTypeEnum::random(),
        valueType: TransactionValueTypeEnum::random(),
        status: TransactionStatusEnum::random(),
        recurrence: TransactionRecurrenceEnum::random(),
        type: TransactionTypeEnum::random(),
        expectedAt: null,
        confirmedAt: fake()->dateTime(),
        cancelledAt: null,
        reversedAt: null,
    );

    $transaction = Transaction::create($dto);

    expect($transaction)->toBeInstanceOf(class: Transaction::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Transaction');

test('Deve retornar um array com os valores do Transaction', function () {
    $dto = new CreateTransactionDto(
        userId: Uuid::random(),
        categoryId: Uuid::random(),
        supplierId: Uuid::random(),
        cardId: Uuid::random(),
        bankAccountId: Uuid::random(),
        installmentId: Uuid::random(),
        subscriptionId: Uuid::random(),
        internalTransferId: Uuid::random(),
        amount: fake()->randomFloat(),
        description: fake()->sentence(),
        paymentMethod: PaymentMethodEnum::random(),
        paymentType: PaymentTypeEnum::random(),
        valueType: TransactionValueTypeEnum::random(),
        status: TransactionStatusEnum::random(),
        recurrence: TransactionRecurrenceEnum::random(),
        type: TransactionTypeEnum::random(),
        expectedAt: null,
        confirmedAt: fake()->dateTime(),
        cancelledAt: null,
        reversedAt: null,
    );

    $expectedTransactionToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'cardId' => $dto->cardId?->getValue(),
        'bankAccountId' => $dto->bankAccountId?->getValue(),
        'installmentId' => $dto->installmentId?->getValue(),
        'subscriptionId' => $dto->subscriptionId?->getValue(),
        'internalTransferId' => $dto->internalTransferId?->getValue(),
        'amount' => $dto->amount,
        'expectedAt' => $dto->expectedAt?->format('Y-m-d H:i:s'),
        'confirmedAt' => $dto->confirmedAt?->format('Y-m-d H:i:s'),
        'cancelledAt' => $dto->cancelledAt?->format('Y-m-d H:i:s'),
        'reversedAt' => $dto->reversedAt?->format('Y-m-d H:i:s'),
        'description' => $dto->description,
        'paymentMethod' => $dto->paymentMethod->value,
        'paymentType' => $dto->paymentType->value,
        'valueType' => $dto->valueType->value,
        'status' => $dto->status->value,
        'recurrence' => $dto->recurrence->value,
        'type' => $dto->type->value,
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $transaction = Transaction::create($dto);

    expect($transaction->toArray())
        ->toBe($expectedTransactionToArray)
        ->toBeArray();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Transaction');

test('Deve retornar uma string com os valores do Transaction', function () {
    $dto = new CreateTransactionDto(
        userId: Uuid::random(),
        categoryId: Uuid::random(),
        supplierId: Uuid::random(),
        cardId: Uuid::random(),
        bankAccountId: Uuid::random(),
        installmentId: Uuid::random(),
        subscriptionId: Uuid::random(),
        internalTransferId: Uuid::random(),
        amount: fake()->randomFloat(),
        description: fake()->sentence(),
        paymentMethod: PaymentMethodEnum::random(),
        paymentType: PaymentTypeEnum::random(),
        valueType: TransactionValueTypeEnum::random(),
        status: TransactionStatusEnum::random(),
        recurrence: TransactionRecurrenceEnum::random(),
        type: TransactionTypeEnum::random(),
        expectedAt: null,
        confirmedAt: fake()->dateTime(),
        cancelledAt: null,
        reversedAt: null,
    );

    $expectedTransactionToArray = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'cardId' => $dto->cardId?->getValue(),
        'bankAccountId' => $dto->bankAccountId?->getValue(),
        'installmentId' => $dto->installmentId?->getValue(),
        'subscriptionId' => $dto->subscriptionId?->getValue(),
        'internalTransferId' => $dto->internalTransferId?->getValue(),
        'amount' => $dto->amount,
        'expectedAt' => $dto->expectedAt?->format('Y-m-d H:i:s'),
        'confirmedAt' => $dto->confirmedAt?->format('Y-m-d H:i:s'),
        'cancelledAt' => $dto->cancelledAt?->format('Y-m-d H:i:s'),
        'reversedAt' => $dto->reversedAt?->format('Y-m-d H:i:s'),
        'description' => $dto->description,
        'paymentMethod' => $dto->paymentMethod->value,
        'paymentType' => $dto->paymentType->value,
        'valueType' => $dto->valueType->value,
        'status' => $dto->status->value,
        'recurrence' => $dto->recurrence->value,
        'type' => $dto->type->value,
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $transaction = Transaction::create($dto);

    expect($transaction->toString())
        ->toBe($expectedTransactionToArray)
        ->toBeString();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Transaction');

test('Deve retornar uma string JSON com os valores do Transaction', function () {
    $dto = new CreateTransactionDto(
        userId: Uuid::random(),
        categoryId: Uuid::random(),
        supplierId: Uuid::random(),
        cardId: Uuid::random(),
        bankAccountId: Uuid::random(),
        installmentId: Uuid::random(),
        subscriptionId: Uuid::random(),
        internalTransferId: Uuid::random(),
        amount: fake()->randomFloat(),
        description: fake()->sentence(),
        paymentMethod: PaymentMethodEnum::random(),
        paymentType: PaymentTypeEnum::random(),
        valueType: TransactionValueTypeEnum::random(),
        status: TransactionStatusEnum::random(),
        recurrence: TransactionRecurrenceEnum::random(),
        type: TransactionTypeEnum::random(),
        expectedAt: null,
        confirmedAt: fake()->dateTime(),
        cancelledAt: null,
        reversedAt: null,
    );

    $expectedTransactionToArray = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'cardId' => $dto->cardId?->getValue(),
        'bankAccountId' => $dto->bankAccountId?->getValue(),
        'installmentId' => $dto->installmentId?->getValue(),
        'subscriptionId' => $dto->subscriptionId?->getValue(),
        'internalTransferId' => $dto->internalTransferId?->getValue(),
        'amount' => $dto->amount,
        'expectedAt' => $dto->expectedAt?->format('Y-m-d H:i:s'),
        'confirmedAt' => $dto->confirmedAt?->format('Y-m-d H:i:s'),
        'cancelledAt' => $dto->cancelledAt?->format('Y-m-d H:i:s'),
        'reversedAt' => $dto->reversedAt?->format('Y-m-d H:i:s'),
        'description' => $dto->description,
        'paymentMethod' => $dto->paymentMethod->value,
        'paymentType' => $dto->paymentType->value,
        'valueType' => $dto->valueType->value,
        'status' => $dto->status->value,
        'recurrence' => $dto->recurrence->value,
        'type' => $dto->type->value,
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $transaction = Transaction::create($dto);

    expect($transaction->toJson())
        ->toBe($expectedTransactionToArray)
        ->toBeString()
        ->toBeJson();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Transaction');
