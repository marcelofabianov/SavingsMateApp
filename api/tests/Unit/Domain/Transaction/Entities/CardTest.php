<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Transaction\Entities\ICard;
use SavingsMate\Domain\Transaction\Dto\CreateCardDto;
use SavingsMate\Domain\Transaction\Entities\Card;

test('Deve criar uma instancia de Card com o ICreateCardDto', function () {
    $dto = new CreateCardDto(
        Uuid::random(),
        true,
        fake()->company(),
        fake()->randomFloat(2, 0, 1000)
    );

    $card = Card::create($dto);

    expect($card)->toBeInstanceOf(ICard::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Card');

test('Deve retornar um array com os valores do Card', function () {
    $dto = new CreateCardDto(
        Uuid::random(),
        true,
        fake()->company(),
        fake()->randomFloat(2, 0, 1000)
    );

    $expectedCardToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'main' => $dto->main,
        'limit' => $dto->limit,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $card = Card::create($dto);

    expect($card->toArray())->toBeArray()
        ->toEqual($expectedCardToArray);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Card');

test('Deve retornar uma string com os valores do Card', function () {
    $dto = new CreateCardDto(
        Uuid::random(),
        true,
        fake()->company(),
        fake()->randomFloat(2, 0, 1000)
    );

    $expectedCardToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'main' => $dto->main,
        'limit' => $dto->limit,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $card = Card::create($dto);

    expect($card->toJson())->toBeString()
        ->toEqual($expectedCardToString);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Card');

test('Deve retornar uma string json com os valores do Card', function () {
    $dto = new CreateCardDto(
        Uuid::random(),
        true,
        fake()->company(),
        fake()->randomFloat(2, 0, 1000)
    );

    $expectedCardToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'main' => $dto->main,
        'limit' => $dto->limit,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $card = Card::create($dto);

    expect($card->toJson())
        ->toBeString()
        ->toBeJson()
        ->toEqual($expectedCardToString);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Card');
