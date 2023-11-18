<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;

test('TransactionRecurrenceEnum deve conter os cases')
    ->expect(TransactionRecurrenceEnum::cases())->toBe([
        TransactionRecurrenceEnum::NONE,
        TransactionRecurrenceEnum::DAILY,
        TransactionRecurrenceEnum::WEEKLY,
        TransactionRecurrenceEnum::MONTHLY,
        TransactionRecurrenceEnum::YEARLY,
    ])
    ->group('Unit', 'Enum', 'TransactionRecurrenceEnum', 'Domain', 'Transaction');

test('TransactionRecurrenceEnum deve retornar um valor aleatório')
    ->expect(TransactionRecurrenceEnum::random())->toBeIn(TransactionRecurrenceEnum::cases())
    ->group('Unit', 'Enum', 'TransactionRecurrenceEnum', 'Domain', 'Transaction');

test('Deve retornar true quando o valor existir nas opcoes')
    ->expect(TransactionRecurrenceEnum::has(TransactionRecurrenceEnum::random()->value))->toBeTrue()
    ->group('Unit', 'Enum', 'TransactionRecurrenceEnum', 'Domain', 'Transaction');

test('Deve retornar false quando o valor nao existir nas opcoes')
    ->expect(TransactionRecurrenceEnum::has(count(TransactionRecurrenceEnum::cases()) + 1))->toBeFalse()
    ->group('Unit', 'Enum', 'TransactionRecurrenceEnum', 'Domain', 'Transaction');
