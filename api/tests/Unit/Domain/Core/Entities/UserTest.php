<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\Dto\CreateUserDto;
use SavingsMate\Domain\Core\Entities\User;
use SavingsMate\Domain\Core\ValueObjects\Email;
use SavingsMate\Domain\Interfaces\Core\Entities\IUser;

test('Deve criar uma instancia de User com o ICreateDtoUser', function () {
    $dto = new CreateUserDto(fake()->name(), Email::random());

    $user = User::create($dto);

    expect($user)->toBeInstanceOf(IUser::class);
})
    ->group('Unit', 'Domain', 'Core', 'Entities', 'User');

test('Deve retornar um array com os valores do User', function () {
    $dto = new CreateUserDto(fake()->name(), Email::random());

    $expectedUserToArray = [
        'id' => $dto->id->getValue(),
        'name' => $dto->name,
        'email' => $dto->email->getValue(),
        'password' => $dto->password->getValue(),
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ];

    $user = User::create($dto);

    expect($user->toArray())->toBeArray()
        ->toEqual($expectedUserToArray);
})
    ->group('Unit', 'Domain', 'Core', 'Entities', 'User');

test('Deve retornar uma string com os valores do User', function () {
    $dto = new CreateUserDto(fake()->name(), Email::random());

    $expectedUserToString = json_encode([
        'id' => $dto->id->getValue(),
        'name' => $dto->name,
        'email' => $dto->email->getValue(),
        'password' => $dto->password->getValue(),
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $user = User::create($dto);

    expect($user->toString())->toBeString()
        ->toEqual($expectedUserToString);
})
    ->group('Unit', 'Domain', 'Core', 'Entities', 'User');

test('Deve retornar um json valido com os valores do User', function () {
    $dto = new CreateUserDto(fake()->name(), Email::random());

    $expectedUserToJson = json_encode([
        'id' => $dto->id->getValue(),
        'name' => $dto->name,
        'email' => $dto->email->getValue(),
        'password' => $dto->password->getValue(),
        'inactivatedAt' => $dto->inactivatedAt->format(),
        'deletedAt' => $dto->deletedAt->format(),
        'createdAt' => $dto->createdAt->format(),
        'updatedAt' => $dto->updatedAt->format(),
    ], JSON_THROW_ON_ERROR);

    $user = User::create($dto);

    expect($user->toJson())->toBeString()->toBeJson()
        ->toEqual($expectedUserToJson);
})
    ->group('Unit', 'Domain', 'Core', 'Entities', 'User');
