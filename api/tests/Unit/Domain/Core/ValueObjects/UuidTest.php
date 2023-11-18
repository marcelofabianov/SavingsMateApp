<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\Exceptions\CoreValueObjectException;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;

test('Deve retornar true quando validado um UUID valido')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect(Uuid::validate('b601c572-4c3e-4298-9dd6-f8bb137ab5cd'))->toBeTrue();

test('Deve retornar false quando validado um UUID invalido')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect(Uuid::validate('94e263-b978-4e6e-905e-d6d77b81c3d6'))->toBeFalse();

test('Deve retonar uma nova instancia quando o UUID informado fo valido')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect(Uuid::create('ac8a0d50-2215-46d4-a4bf-5a4de9ebaf50'))->toBeInstanceOf(IUuid::class);

test('Deve lancar uma exception quando o UUID informado for invalido ao tentar criar uma instancia')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->throws(CoreValueObjectException::class)
    ->expect(fn () => Uuid::create('28afa2b3-0c27-4a32-a7d8-d5431976ffb124'));

test('Deve lancar uma exception quando informado uma string vazia ao tentar criar uma instancia')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->throws(CoreValueObjectException::class)
    ->expect(fn () => Uuid::create(''));

test('Deve retornar uma nova instancia com UUID gerado aleatoriamente valido')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect(Uuid::random())->toBeInstanceOf(IUuid::class)
    ->and(Uuid::validate(Uuid::random()->getValue()))->toBeTrue();

test('Deve retornar true quando comparado dois UUIDs iguais')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect(Uuid::create('61f7a3bc-7357-4958-a51a-a13c2a44581d')->equals(Uuid::create('61f7a3bc-7357-4958-a51a-a13c2a44581d')))->toBeTrue();

test('Deve retornar false quando comparado dois UUIDs diferentes')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect(Uuid::create('a850c756-8721-4237-a742-93774a5d202e')->equals(Uuid::create('cc381a0f-c914-45d1-ad5c-4840e33c88b8')))->toBeFalse();

test('Deve retornar o valor do UUID quando chamado o metodo __toString')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect((string) Uuid::create('ae1e80c3-a7fa-40ae-a544-6b33f763e5cd'))->toBe('ae1e80c3-a7fa-40ae-a544-6b33f763e5cd');

test('Deve retornar o valor do UUID armazenado')
    ->group('Unit', 'Datetime', 'Uuid', 'ValueObject')
    ->expect('5991e854-3d16-4466-88f6-e2558bf1a82a')->toBe(Uuid::create('5991e854-3d16-4466-88f6-e2558bf1a82a')->getValue());
