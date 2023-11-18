<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;

test('TransactionStatusEnum deve conter os cases')
    ->expect(TransactionStatusEnum::cases())->toBe([
        TransactionStatusEnum::PENDING,
        TransactionStatusEnum::CONFIRMED,
        TransactionStatusEnum::CANCELLED,
        TransactionStatusEnum::REVERSED,
    ])
    ->group('Unit', 'Enum', 'TransactionStatusEnum', 'Domain', 'Transaction');

test('TransactionStatusEnum deve retornar um valor aleatório')
    ->expect(TransactionStatusEnum::random())->toBeIn(TransactionStatusEnum::cases())
    ->group('Unit', 'Enum', 'TransactionStatusEnum', 'Domain', 'Transaction');

test('Deve retornar true quando o valor existir nas opcoes')
    ->expect(TransactionStatusEnum::has(TransactionStatusEnum::random()->value))->toBeTrue()
    ->group('Unit', 'Enum', 'TransactionStatusEnum', 'Domain', 'Transaction');

test('Deve retornar false quando o valor nao existir nas opcoes')
    ->expect(TransactionStatusEnum::has(count(TransactionStatusEnum::cases()) + 1))->toBeFalse()
    ->group('Unit', 'Enum', 'TransactionStatusEnum', 'Domain', 'Transaction');
