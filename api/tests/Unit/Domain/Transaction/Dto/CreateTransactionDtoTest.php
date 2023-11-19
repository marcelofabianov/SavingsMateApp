<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Transaction\Dto\CreateTransactionDto;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;

test('Deve criar uma instancia de CreateTransactionDto somente com dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'categoryId' => Uuid::random(),
        'supplierId' => Uuid::random(),
        'cardId' => Uuid::random(),
        'bankAccountId' => null,
        'installmentId' => null,
        'subscriptionId' => null,
        'internalTransferId' => null,
        'amount' => 100.00,
        'description' => fake()->sentence(),
        'paymentMethod' => PaymentMethodEnum::CARD,
        'paymentType' => PaymentTypeEnum::SINGLE,
        'valueType' => TransactionValueTypeEnum::VARIABLE,
        'status' => TransactionStatusEnum::CONFIRMED,
        'recurrence' => TransactionRecurrenceEnum::NONE,
        'type' => TransactionTypeEnum::EXPENSE,
        'confirmedAt' => new DateTimeImmutable(),
    ];

    $dto = new CreateTransactionDto(
        userId: $data['userId'],
        categoryId: $data['categoryId'],
        supplierId: $data['supplierId'],
        cardId: $data['cardId'],
        bankAccountId: $data['bankAccountId'],
        installmentId: $data['installmentId'],
        subscriptionId: $data['subscriptionId'],
        internalTransferId: $data['internalTransferId'],
        amount: $data['amount'],
        description: $data['description'],
        paymentMethod: $data['paymentMethod'],
        paymentType: $data['paymentType'],
        valueType: $data['valueType'],
        status: $data['status'],
        recurrence: $data['recurrence'],
        type: $data['type'],
        confirmedAt: $data['confirmedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->categoryId)->toBe($data['categoryId'])
        ->and($dto->supplierId)->toBe($data['supplierId'])
        ->and($dto->cardId)->toBe($data['cardId'])
        ->and($dto->bankAccountId)->toBe($data['bankAccountId'])
        ->and($dto->installmentId)->toBe($data['installmentId'])
        ->and($dto->subscriptionId)->toBe($data['subscriptionId'])
        ->and($dto->internalTransferId)->toBe($data['internalTransferId'])
        ->and($dto->amount)->toBe($data['amount'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->paymentMethod)->toBe($data['paymentMethod'])
        ->and($dto->paymentType)->toBe($data['paymentType'])
        ->and($dto->valueType)->toBe($data['valueType'])
        ->and($dto->status)->toBe($data['status'])
        ->and($dto->recurrence)->toBe($data['recurrence'])
        ->and($dto->type)->toBe($data['type'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->expectedAt)->toBeNull()
        ->and($dto->confirmedAt)->toBe($data['confirmedAt'])
        ->and($dto->cancelledAt)->toBeNull()
        ->and($dto->reversedAt)->toBeNull()
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'CreateTransactionDto');

test('Deve criar uma instancia de CreateTransactionDto com todos os dados', function () {
    $data = [
        'userId' => Uuid::random(),
        'categoryId' => Uuid::random(),
        'supplierId' => Uuid::random(),
        'cardId' => null,
        'bankAccountId' => Uuid::random(),
        'installmentId' => null,
        'subscriptionId' => null,
        'internalTransferId' => null,
        'amount' => 100.00,
        'description' => fake()->sentence(),
        'paymentMethod' => PaymentMethodEnum::PIX,
        'paymentType' => PaymentTypeEnum::SINGLE,
        'valueType' => TransactionValueTypeEnum::VARIABLE,
        'status' => TransactionStatusEnum::CONFIRMED,
        'recurrence' => TransactionRecurrenceEnum::NONE,
        'type' => TransactionTypeEnum::EXPENSE,
        'id' => Uuid::random(),
        'expectedAt' => new DateTimeImmutable(),
        'confirmedAt' => new DateTimeImmutable(),
        'cancelledAt' => new DateTimeImmutable(),
        'reversedAt' => new DateTimeImmutable(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateTransactionDto(
        userId: $data['userId'],
        categoryId: $data['categoryId'],
        supplierId: $data['supplierId'],
        cardId: $data['cardId'],
        bankAccountId: $data['bankAccountId'],
        installmentId: $data['installmentId'],
        subscriptionId: $data['subscriptionId'],
        internalTransferId: $data['internalTransferId'],
        amount: $data['amount'],
        description: $data['description'],
        paymentMethod: $data['paymentMethod'],
        paymentType: $data['paymentType'],
        valueType: $data['valueType'],
        status: $data['status'],
        recurrence: $data['recurrence'],
        type: $data['type'],
        id: $data['id'],
        expectedAt: $data['expectedAt'],
        confirmedAt: $data['confirmedAt'],
        cancelledAt: $data['cancelledAt'],
        reversedAt: $data['reversedAt'],
        createdAt: $data['createdAt'],
        updatedAt: $data['updatedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->categoryId)->toBe($data['categoryId'])
        ->and($dto->supplierId)->toBe($data['supplierId'])
        ->and($dto->cardId)->toBe($data['cardId'])
        ->and($dto->bankAccountId)->toBe($data['bankAccountId'])
        ->and($dto->installmentId)->toBe($data['installmentId'])
        ->and($dto->subscriptionId)->toBe($data['subscriptionId'])
        ->and($dto->internalTransferId)->toBe($data['internalTransferId'])
        ->and($dto->amount)->toBe($data['amount'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->paymentMethod)->toBe($data['paymentMethod'])
        ->and($dto->paymentType)->toBe($data['paymentType'])
        ->and($dto->valueType)->toBe($data['valueType'])
        ->and($dto->status)->toBe($data['status'])
        ->and($dto->recurrence)->toBe($data['recurrence'])
        ->and($dto->type)->toBe($data['type'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->expectedAt)->toBe($data['expectedAt'])
        ->and($dto->confirmedAt)->toBe($data['confirmedAt'])
        ->and($dto->cancelledAt)->toBe($data['cancelledAt'])
        ->and($dto->reversedAt)->toBe($data['reversedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'CreateTransactionDto');
