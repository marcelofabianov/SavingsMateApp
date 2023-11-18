<?php

declare(strict_types=1);

use SavingsMate\Domain\Interfaces\Core\IValueObject;

test('Classes de ValueObjects devem implementar a interface IValueObject')
    ->expect('SavingsMate\Domain\Core\ValueObjects')->toImplement(IValueObject::class)
    ->and('SavingsMate\Domain\Transaction\ValueObjects')->toImplement(IValueObject::class);

test('Toda interface de ValueObject extender a interface IValueObject')
    ->expect('SavingsMate\Interfaces\Domain\Core\ValueObjects')->toExtend(IValueObject::class)
    ->and('SavingsMate\Interfaces\Domain\Transaction\ValueObjects')->toExtend(IValueObject::class);

test('Classes de ValueObjects devem implementar o metodo __toString()')
    ->expect('SavingsMate\Domain\Core\ValueObjects')->toHaveMethod('__toString')
    ->and('SavingsMate\Domain\Transaction\ValueObjects')->toHaveMethod('__toString');

test('Classes de ValueObjects devem ser final')
    ->expect('SavingsMate\Domain\Core\ValueObjects')->toBeFinal()
    ->and('SavingsMate\Domain\Transaction\ValueObjects')->toBeFinal();

test('Classes de ValueObjects devem ter um construtor')
    ->expect('SavingsMate\Domain\Core\ValueObjects')->toHaveConstructor()
    ->and('SavingsMate\Domain\Transaction\ValueObjects')->toHaveConstructor();

test('Classes de ValueObjects devem ter o metodo create estativo para criar uma nova instancia')
    ->expect('SavingsMate\Domain\Core\ValueObjects')->toHaveMethod('create')
    ->and('SavingsMate\Domain\Transaction\ValueObjects')->toHaveMethod('create');
