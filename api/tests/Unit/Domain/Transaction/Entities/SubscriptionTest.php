<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Transaction\Dto\CreateSubscriptionDto;
use SavingsMate\Domain\Transaction\Entities\Subscription;

test('Deve criar uma instancia de Subscription com o ICreateSubscriptionDto', function () {
    $dto = new CreateSubscriptionDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        price: fake()->randomFloat(2, 0, 1000),
        startDate: fake()->dateTime(),
        endDate: fake()->dateTime(),
        isAutoRenewal: fake()->boolean(),
        description: fake()->text(100),
    );

    $subscription = Subscription::create($dto);

    expect($subscription)->toBeInstanceOf(Subscription::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Subscription');

test('Deve retornar um array com os valores do Subscription', function () {
    $dto = new CreateSubscriptionDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        price: fake()->randomFloat(2, 0, 1000),
        startDate: fake()->dateTime(),
        endDate: fake()->dateTime(),
        isAutoRenewal: fake()->boolean(),
        description: fake()->text(100),
    );

    $expectedSubscriptionToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'cardId' => $dto->cardId->getValue(),
        'description' => $dto->description,
        'price' => $dto->price,
        'startDate' => $dto->startDate->format('Y-m-d H:i:s'),
        'endDate' => $dto->endDate->format('Y-m-d H:i:s'),
        'isAutoRenewal' => $dto->isAutoRenewal,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $subscription = Subscription::create($dto);

    expect($subscription->toArray())
        ->toBe($expectedSubscriptionToArray)
        ->toBeArray();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Subscription');

test('Deve retornar uma string com os valores do Subscription', function () {
    $dto = new CreateSubscriptionDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        price: fake()->randomFloat(2, 0, 1000),
        startDate: fake()->dateTime(),
        endDate: fake()->dateTime(),
        isAutoRenewal: fake()->boolean(),
        description: fake()->text(100),
    );

    $expectedSubscriptionToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'cardId' => $dto->cardId->getValue(),
        'description' => $dto->description,
        'price' => $dto->price,
        'startDate' => $dto->startDate->format('Y-m-d H:i:s'),
        'endDate' => $dto->endDate->format('Y-m-d H:i:s'),
        'isAutoRenewal' => $dto->isAutoRenewal,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $subscription = Subscription::create($dto);

    expect($subscription->toString())
        ->toBe($expectedSubscriptionToString)
        ->toBeString();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Subscription');

test('Deve retornar uma string JSON com os valores Subscription', function () {
    $dto = new CreateSubscriptionDto(
        userId: Uuid::random(),
        supplierId: Uuid::random(),
        categoryId: Uuid::random(),
        cardId: Uuid::random(),
        price: fake()->randomFloat(2, 0, 1000),
        startDate: fake()->dateTime(),
        endDate: fake()->dateTime(),
        isAutoRenewal: fake()->boolean(),
        description: fake()->text(100),
    );

    $expectedSubscriptionToJson = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'supplierId' => $dto->supplierId->getValue(),
        'categoryId' => $dto->categoryId->getValue(),
        'cardId' => $dto->cardId->getValue(),
        'description' => $dto->description,
        'price' => $dto->price,
        'startDate' => $dto->startDate->format('Y-m-d H:i:s'),
        'endDate' => $dto->endDate->format('Y-m-d H:i:s'),
        'isAutoRenewal' => $dto->isAutoRenewal,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $subscription = Subscription::create($dto);

    expect($subscription->toJson())
        ->toBe($expectedSubscriptionToJson)
        ->toBeString()
        ->toBeJson();
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Subscription');
