<?php

declare(strict_types=1);

use SavingsMate\Domain\Core\Exceptions\CorePasswordException;
use SavingsMate\Domain\Core\ValueObjects\Password;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IPassword;

test('Deve retornar true quando senha informada for forte')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('Abc123!@#'))->toBeTrue();

test('Deve retornar false quando senha informada for fraca')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('abc123'))->toBeFalse();

test('Deve retornar false quando senha informada for vazia')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate(''))->toBeFalse();

test('Deve retornar false quando senha nao conter letras')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('12345678'))->toBeFalse();

test('Deve retornar false quando senha nao conter numeros')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('Abcdefgh'))->toBeFalse();

test('Deve retornar false quando senha nao conter caracteres especiais')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('Abcdefgh12345678'))->toBeFalse();

test('Deve retornar false quando senha conter menos de 8 caracteres')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('Abc123!'))->toBeFalse();

test('Deve retornar false quando a senha nao tiver letras maiusculas')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('abc123!@#'))->toBeFalse();

test('Deve retornar false quando a senha nao tiver letras minusculas')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::validate('ABC123!@#'))->toBeFalse();

test('Deve criar uma nova instancia de Password quando a senha informada for forte')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc123!@#'))->toBeInstanceOf(IPassword::class);

test('Deve lancar uma excecao quando tentar criar uma instancia de Password com a senha fraca')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->throws(exception: CorePasswordException::class)
    ->expect(fn () => Password::create('12345678'));

test('Deve retornar true quando a senha informada for igual a senha da instancia')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc123!@#')
        ->equals(Password::create('Abc123!@#')))->toBeTrue();

test('Deve retornar false quando a senha informada for diferente da senha da instancia')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::create('Abc12$@$#3')
        ->equals(Password::create('Abc123!@#')))->toBeFalse();

test('Deve criar uma nova instancia de Password com senha aleatoria valida')
    ->group('Password', 'ValueObject', 'Domain', 'Core', 'Unit')
    ->expect(Password::random())->toBeInstanceOf(IPassword::class)
    ->and(Password::validate(Password::random()->getValue()))->toBeTrue()
    ->repeat(random_int(100, 200));
