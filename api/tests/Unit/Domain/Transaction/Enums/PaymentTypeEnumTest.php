<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;

test('PaymentTypeEnum deve conter os cases')
    ->expect(PaymentTypeEnum::cases())->toBe([
        PaymentTypeEnum::SINGLE,
        PaymentTypeEnum::INSTALLMENTS,
        PaymentTypeEnum::SUBSCRIPTION,
    ])
    ->group('Unit', 'Enum', 'PaymentTypeEnum', 'Domain', 'Transaction');

test('PaymentTypeEnum deve retornar um valor aleatório')
    ->expect(PaymentTypeEnum::random())->toBeIn(PaymentTypeEnum::cases())
    ->group('Unit', 'Enum', 'PaymentTypeEnum', 'Domain', 'Transaction');

test('Deve retornar true se contém um valor')
    ->expect(PaymentTypeEnum::has(PaymentTypeEnum::random()->value))->toBeTrue()
    ->group('Unit', 'Enum', 'PaymentTypeEnum', 'Domain', 'Transaction');

test('Deve retornar false se não contém um valor')
    ->expect(PaymentTypeEnum::has(count(PaymentTypeEnum::cases()) + 1))->toBeFalse()
    ->group('Unit', 'Enum', 'PaymentTypeEnum', 'Domain', 'Transaction');
