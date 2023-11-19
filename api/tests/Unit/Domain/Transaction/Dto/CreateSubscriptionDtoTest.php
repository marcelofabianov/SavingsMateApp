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
use SavingsMate\Domain\Transaction\Dto\CreateSubscriptionDto;

test('Deve criar uma instancia de CreateSubscriptionDto somente com os dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'supplierId' => Uuid::random(),
        'categoryId' => Uuid::random(),
        'cardId' => Uuid::random(),
        'price' => fake()->randomFloat(2, 1, 1000),
        'startDate' => fake()->dateTime(),
        'endDate' => fake()->dateTime(),
        'isAutoRenewal' => fake()->boolean(),
        'description' => fake()->sentence(),
    ];

    $dto = new CreateSubscriptionDto(
        $data['userId'],
        $data['supplierId'],
        $data['categoryId'],
        $data['cardId'],
        $data['price'],
        $data['startDate'],
        $data['endDate'],
        $data['isAutoRenewal'],
        $data['description']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->supplierId)->toBe($data['supplierId'])
        ->and($dto->categoryId)->toBe($data['categoryId'])
        ->and($dto->cardId)->toBe($data['cardId'])
        ->and($dto->price)->toBe($data['price'])
        ->and($dto->startDate)->toBe($data['startDate'])
        ->and($dto->endDate)->toBe($data['endDate'])
        ->and($dto->isAutoRenewal)->toBe($data['isAutoRenewal'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Subscription');

test('Deve criar uma instancia de CreateSubscriptionDto com todos os dados', function () {
    $data = [
        'userId' => Uuid::random(),
        'supplierId' => Uuid::random(),
        'categoryId' => Uuid::random(),
        'cardId' => Uuid::random(),
        'price' => fake()->randomFloat(2, 1, 1000),
        'startDate' => fake()->dateTime(),
        'endDate' => fake()->dateTime(),
        'isAutoRenewal' => fake()->boolean(),
        'description' => fake()->sentence(),
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateSubscriptionDto(
        $data['userId'],
        $data['supplierId'],
        $data['categoryId'],
        $data['cardId'],
        $data['price'],
        $data['startDate'],
        $data['endDate'],
        $data['isAutoRenewal'],
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
        ->and($dto->price)->toBe($data['price'])
        ->and($dto->startDate)->toBe($data['startDate'])
        ->and($dto->endDate)->toBe($data['endDate'])
        ->and($dto->isAutoRenewal)->toBe($data['isAutoRenewal'])
        ->and($dto->description)->toBe($data['description'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Subscription');
