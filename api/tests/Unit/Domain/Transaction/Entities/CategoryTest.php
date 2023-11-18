<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Transaction\Entities\ICategory;
use SavingsMate\Domain\Transaction\Dto\CreateCategoryDto;
use SavingsMate\Domain\Transaction\Entities\Category;
use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;

test('Deve criar uma instancia de Category com o ICreateCategoryDto', function () {
    $dto = new CreateCategoryDto(
        Uuid::random(),
        fake()->sentence(),
        CategoryColorEnum::random(),
        TransactionTypeEnum::random(),
    );

    $category = Category::create($dto);

    expect($category)->toBeInstanceOf(ICategory::class);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Category');

test('Deve retornar um array com os valores do Category', function () {
    $dto = new CreateCategoryDto(
        Uuid::random(),
        fake()->sentence(),
        CategoryColorEnum::random(),
        TransactionTypeEnum::random(),
    );

    $expectedCategoryToArray = [
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'color' => $dto->color->value,
        'type' => $dto->type->value,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $category = Category::create($dto);

    expect($category->toArray())->toBeArray()
        ->toEqual($expectedCategoryToArray);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Category');

test('Deve retornar uma string com os valores do Category', function () {
    $dto = new CreateCategoryDto(
        Uuid::random(),
        fake()->sentence(),
        CategoryColorEnum::random(),
        TransactionTypeEnum::random(),
    );

    $expectedCategoryToString = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'color' => $dto->color->value,
        'type' => $dto->type->value,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $category = Category::create($dto);

    expect($category->toJson())->toBeString()
        ->toEqual($expectedCategoryToString);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Category');

test('Deve retornar uma string json com os valores da Category', function () {
    $dto = new CreateCategoryDto(
        Uuid::random(),
        fake()->sentence(),
        CategoryColorEnum::random(),
        TransactionTypeEnum::random(),
    );

    $expectedCategoryToJson = json_encode([
        'id' => $dto->id->getValue(),
        'userId' => $dto->userId->getValue(),
        'name' => $dto->name,
        'color' => $dto->color->value,
        'type' => $dto->type->value,
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $category = Category::create($dto);

    expect($category->toJson())
        ->toBeString()
        ->toBeJson()
        ->toEqual($expectedCategoryToJson);
})
    ->group('Unit', 'Domain', 'Transaction', 'Entities', 'Category');
