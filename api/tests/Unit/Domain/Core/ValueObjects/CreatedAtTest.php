<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\Exceptions\CoreValueObjectException;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;

test('Deve retornar true quando uma data valida for passada como string')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::validate('2021-01-01 00:00:00'))->toBeTrue();

test('Deve retornar false quando uma data invalida for passada como string')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::validate('invalid'))->toBeFalse();

test('Deve retornar true quando uma data valida for passada como CarbonInterface')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::validate(new DateTime()))->toBeTrue();

test('Deve retornar true quando uma data valida for passa como DateTimeInterface')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::validate(new DateTime()))->toBeTrue();

test('Deve criar uma nova instancia de CreatedAt com uma data valida como string')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::create('2021-01-01 00:00:00'))->toBeInstanceOf(ICreatedAt::class);

test('Deve criar uma nova instancia de CreatedAt com uma data valida como CarbonInterface')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::create(new DateTime()))->toBeInstanceOf(ICreatedAt::class);

test('Deve criar uma nova instancia de CreatedAt com uma data valida como DateTimeInterface')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::create(new DateTime()))->toBeInstanceOf(ICreatedAt::class);

test('Deve lancar uma excecao quando uma data invalida for passada como string')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->throws(CoreValueObjectException::class)
    ->expect(fn () => CreatedAt::create(''));

test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo __toString for chamado')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect((string) CreatedAt::create('2021-01-01 00:00:00'))->toBe('2021-01-01 00:00:00');

test('Deve retornar uma instancia de DateTimeInterface quando o metodo getValue for chamado')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::create('2021-01-01 00:00:00')->getValue())->toBeInstanceOf(DateTimeInterface::class);

test('Deve retornar uma string formatada quando o metodo format for chamado')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::create('2021-01-01 00:00:00')->format('Y'))->toBe('2021');

test('Deve retornar uma instancia de ICreatedAt quando o metodo random for chamado')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::random())->toBeInstanceOf(ICreatedAt::class);

test('Deve retornar uma instancia de ICreatedAt quando o metodo now for chamado')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::now())->toBeInstanceOf(ICreatedAt::class);

test('Deve retornar string com a data formata para padrao ISO8601 quando o metodo toIso8601 for chamado')
    ->todo()
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->expect(CreatedAt::create('2021-01-01T21:53:51-03:00')->toIso8601())->toBe('2021-01-01T00:00:00.000000Z');
