<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IDeletedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Transaction\Dto\CreateCardDto;

test('Deve criar uma instancia de CreateCardDto somente com os dados obrigatorios', closure: function () {
    $data = [
        'userId' => Uuid::random(),
        'main' => fake()->boolean(),
        'name' => fake()->company(),
        'limit' => fake()->randomFloat(2, 100, 1000),
    ];

    $dto = new CreateCardDto(
        $data['userId'],
        $data['main'],
        $data['name'],
        $data['limit']
    );

    expect($dto->userId)->toBe($data['userId'])
        ->and($dto->main)->toBe($data['main'])
        ->and($dto->name)->toBe($data['name'])
        ->and($dto->limit)->toBe($data['limit'])
        ->and($dto->id)->toBeInstanceOf(IUuid::class)
        ->and($dto->inactivatedAt)->toBeInstanceOf(IInactivatedAt::class)
        ->and($dto->deletedAt)->toBeInstanceOf(IDeletedAt::class)
        ->and($dto->createdAt)->toBeInstanceOf(ICreatedAt::class)
        ->and($dto->updatedAt)->toBeInstanceOf(IUpdatedAt::class);
})
    ->group('Unit', 'Dto', 'Domain', 'Transaction', 'Card');
