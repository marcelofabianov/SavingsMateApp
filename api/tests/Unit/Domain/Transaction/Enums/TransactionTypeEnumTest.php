<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;

test('TransactionTypeEnum deve conter os cases')
    ->expect(TransactionTypeEnum::cases())->toBe([
        TransactionTypeEnum::INCOME,
        TransactionTypeEnum::EXPENSE,
    ])
    ->group('Unit', 'Enum', 'TransactionTypeEnum', 'Domain', 'Transaction');

test('TransactionTypeEnum deve retornar um valor aleatório')
    ->expect(TransactionTypeEnum::random())->toBeIn(TransactionTypeEnum::cases())
    ->group('Unit', 'Enum', 'TransactionTypeEnum', 'Domain', 'Transaction');

test('Deve retornar true quando o valor existir nas opcoes')
    ->expect(TransactionTypeEnum::has(TransactionTypeEnum::random()->value))->toBeTrue()
    ->group('Unit', 'Enum', 'TransactionTypeEnum', 'Domain', 'Transaction');

test('Deve retornar false quando o valor nao existir nas opcoes')
    ->expect(TransactionTypeEnum::has(count(TransactionTypeEnum::cases()) + 1))->toBeFalse()
    ->group('Unit', 'Enum', 'TransactionTypeEnum', 'Domain', 'Transaction');
