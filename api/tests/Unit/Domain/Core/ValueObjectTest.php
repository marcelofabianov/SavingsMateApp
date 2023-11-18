<?php

declare(strict_types=1);

use SavingsMate\Domain\Interfaces\Core\IValueObject;

test('Classes de ValueObjects devem implementar a interface IValueObject')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toImplement(IValueObject::class);

test('Toda interface de ValueObject extender a interface IValueObject')
    ->expect('SavingsMate\Interfaces\Domain\Core\ValueObjects')
    ->toExtend(IValueObject::class);

test('Classes de ValueObjects devem extender a classe ValueObject')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toExtend(SavingsMate\Domain\Core\ValueObject::class);

test('Classe ValueObject deve ser abstrata')
    ->expect(SavingsMate\Domain\Core\ValueObject::class)
    ->toBeAbstract();

test('Classe ValueObject deve ser o metodo __toString()')
    ->expect(SavingsMate\Domain\Core\ValueObject::class)
    ->toHaveMethod('__toString');

test('Classes de ValueObjects devem implementar o metodo __toString()')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toHaveMethod('__toString');

test('Classes de ValueObjects devem ser final')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toBeFinal();

test('Classes de ValueObjects devem ser readonly')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toBeReadonly();

test('Classes de ValueObjects devem ter um construtor')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toHaveConstructor();

test('Classes de ValueObjects devem ter o metodo create estativo para criar uma nova instancia')
    ->expect('SavingsMate\Domain\Core\ValueObjects')
    ->toHaveMethod('create');
