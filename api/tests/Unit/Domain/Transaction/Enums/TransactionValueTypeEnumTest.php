<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;

test('TransactionValueTypeEnum deve conter os cases')
    ->expect(TransactionValueTypeEnum::cases())->toBe([
        TransactionValueTypeEnum::VARIABLE,
        TransactionValueTypeEnum::FIXED,
    ])
    ->group('Unit', 'Enum', 'TransactionValueTypeEnum', 'Domain', 'Transaction');

test('TransactionValueTypeEnum deve retornar um valor aleatório')
    ->expect(TransactionValueTypeEnum::random())->toBeIn(TransactionValueTypeEnum::cases())
    ->group('Unit', 'Enum', 'TransactionValueTypeEnum', 'Domain', 'Transaction');

test('Deve retornar true quando o valor existir nas opcoes')
    ->expect(TransactionValueTypeEnum::has(TransactionValueTypeEnum::random()->value))->toBeTrue()
    ->group('Unit', 'Enum', 'TransactionValueTypeEnum', 'Domain', 'Transaction');

test('Deve retornar false quando o valor nao existir nas opcoes')
    ->expect(TransactionValueTypeEnum::has(count(TransactionValueTypeEnum::cases()) + 1))->toBeFalse()
    ->group('Unit', 'Enum', 'TransactionValueTypeEnum', 'Domain', 'Transaction');
