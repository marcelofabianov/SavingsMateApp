<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\Exceptions\CoreValueObjectException;
use SavingsMate\Domain\Core\ValueObjects\InactivatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IInactivatedAt;

test('Deve retornar true quando informado um valor de um data como string valida')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::validate('2021-01-01'))->toBeTrue();

test('Deve retornar true quando informado um valor de um data como CarbonInterface valida')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::validate(new DateTime()))->toBeTrue();

test('Deve retornar true quando informado um valor de um data como DateTimeInterface valida')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::validate(new DateTime()))->toBeTrue();

test('Deve retornar false quando informado um valor de um data como string invalida')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::validate('invalid'))->toBeFalse();

test('Deve criar uma nova instancia de InactivatedAt com valor inicial null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->getValue())->toBeNull();

test('Deve retornar valor null ao chamar o método nullable()')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::nullable()->getValue())->toBeNull()
    ->and(InactivatedAt::nullable()->isNull())->toBeTrue()
    ->and(InactivatedAt::nullable())->toBeInstanceOf(IInactivatedAt::class)
    ->and(InactivatedAt::nullable())->toEqual(InactivatedAt::create(null));

test('Deve retornar true quando verificado se o valor da instancia esta como null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->isNull())->toBeTrue();

test('Deve retornar false quando verificado se o valor da instancia esta como null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(new DateTime())->isNull())->toBeFalse();

test('Deve retornar true quando verificado se o valor da instancia nao e null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(new DateTime())->isNotNull())->toBeTrue();

test('Deve retornar false quando verificado se o valor da instancia nao e null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->isNotNull())->toBeFalse();

test('Deve retornar uma nova instancia de InactivatedAt com valor inicial igual a data atual')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::now()->getValue())->toBeInstanceOf(DateTime::class);

test('Deve retornar uma nova instancia de InactivatedAt com valor randomico')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::random()->getValue())->toBeInstanceOf(DateTime::class);

test('Deve lancar uma excecao quando uma data invalida for passada como string')
    ->group('Unit', 'Datetime', 'CreatedAt', 'ValueObject')
    ->throws(CoreValueObjectException::class)
    ->expect(fn () => InactivatedAt::create(''));

test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo __toString for chamado')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect((string) InactivatedAt::create('2021-01-01 00:00:00'))->toBe('2021-01-01 00:00:00');

test('Deve retornar uma instancia de DateTimeInterface quando o metodo getValue for chamado')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create('2021-01-01 00:00:00')->getValue())->toBeInstanceOf(DateTimeInterface::class);

test('Deve retornar uma string formatada quando o metodo format for chamado')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create('2021-01-01 00:00:00')->format('Y'))->toBe('2021');

test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo toISOString for chamado')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create('2021-01-01 00:00:00')->format())->toBe('2021-01-01 00:00:00');

test('Deve retornar uma string no formato Y-m-d H:i:s quando o metodo format for chamado')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create('2021-01-01 00:00:00')->format())->toBe('2021-01-01 00:00:00');

test('Deve retornar null quando o metodo toISOString for chamado e o valor da instancia for null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->toIso8601())->toBeNull();

test('Deve retornar null quando o metodo format for chamado e o valor da instancia for null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->format())->toBeNull();

test('Deve retornar null quando o metodo getValue for chamado e o valor da instancia for null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->getValue())->toBeNull();

test('Deve retornar string vazia quando o metodo __toString for chamado e o valor da instancia for null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect((string) InactivatedAt::create(null))->toBe('');

test('Deve retornar true quando o metodo hasNullValue for chamado e o valor da instancia for null')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create(null)->isNull())->toBeTrue();

test('Deve retornar false quando o metodo hasNullValue for chamado e o valor da instancia for uma data valida')
    ->group('InactivatedAt', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(InactivatedAt::create('2023-01-01 00:00:00')->isNull())->toBeFalse();
