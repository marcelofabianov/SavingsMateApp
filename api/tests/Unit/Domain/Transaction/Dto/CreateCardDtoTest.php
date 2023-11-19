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
use SavingsMate\Domain\Transaction\Dto\CreateCardDto;
use SavingsMate\Domain\Transaction\Enums\CardScopeEnum;
use SavingsMate\Domain\Transaction\Enums\CardTypeEnum;

test('Deve criar uma instancia de CreateCardDto somente com os dados obrigatorios', function () {
    $data = [
        'userId' => Uuid::random(),
        'main' => fake()->boolean(),
        'lastFourDigits' => fake()->randomNumber(4),
        'name' => fake()->company(),
        'limit' => fake()->randomFloat(2, 100, 1000),
        'type' => CardTypeEnum::CREDIT,
        'scope' => CardScopeEnum::BOTH,
    ];

    $dto = new CreateCardDto(
        $data['userId'],
        $data['main'],
        $data['lastFourDigits'],
        $data['name'],
        $data['limit'],
        $data['type'],
        $data['scope']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->main)->toBe($data['main'])
        ->and($dto->lastFourDigits)->toBe($data['lastFourDigits'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->limit)->toBe($data['limit'])
        ->and($dto->type)->toBe($data['type'])
        ->and($dto->scope)->toBe($data['scope'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Card');

test('Deve criar uma instancia de CreateCardDto com todos os campos', function () {
    $data = [
        'userId' => Uuid::random(),
        'main' => fake()->boolean(),
        'lastFourDigits' => fake()->randomNumber(4),
        'name' => fake()->company(),
        'limit' => fake()->randomFloat(2, 100, 1000),
        'type' => CardTypeEnum::CREDIT,
        'scope' => CardScopeEnum::BOTH,
        'id' => Uuid::random(),
        'inactivatedAt' => InactivatedAt::random(),
        'deletedAt' => DeletedAt::random(),
        'createdAt' => CreatedAt::random(),
        'updatedAt' => UpdatedAt::random(),
    ];

    $dto = new CreateCardDto(
        $data['userId'],
        $data['main'],
        $data['lastFourDigits'],
        $data['name'],
        $data['limit'],
        $data['type'],
        $data['scope'],
        $data['id'],
        $data['inactivatedAt'],
        $data['deletedAt'],
        $data['createdAt'],
        $data['updatedAt']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->main)->toBe($data['main'])
        ->and($dto->lastFourDigits)->toBe($data['lastFourDigits'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->limit)->toBe($data['limit'])
        ->and($dto->type)->toBe($data['type'])
        ->and($dto->scope)->toBe($data['scope'])
        ->and($dto->id)->toBe($data['id'])
        ->and($dto->inactivatedAt)->toBe($data['inactivatedAt'])
        ->and($dto->deletedAt)->toBe($data['deletedAt'])
        ->and($dto->createdAt)->toBe($data['createdAt'])
        ->and($dto->updatedAt)->toBe($data['updatedAt']);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Card');
