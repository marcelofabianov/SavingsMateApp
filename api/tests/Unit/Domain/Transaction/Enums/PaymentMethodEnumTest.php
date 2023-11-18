<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;

test('PaymentMethodEnum deve conter os cases')
    ->expect(PaymentMethodEnum::cases())
    ->toBe([
        PaymentMethodEnum::CASH,
        PaymentMethodEnum::CARD,
        PaymentMethodEnum::CARD_DEBIT,
        PaymentMethodEnum::TRANSFER,
        PaymentMethodEnum::PIX,
        PaymentMethodEnum::OTHER,
    ])
    ->group('Unit', 'Enum', 'PaymentMethodEnum', 'Domain', 'Transaction');

test('PaymentMethodEnum deve retornar um valor aleatório')
    ->expect((PaymentMethodEnum::random()))->toBeIn(PaymentMethodEnum::cases())
    ->group('Unit', 'Enum', 'PaymentMethodEnum', 'Domain', 'Transaction');

test('Deve retornar true quando o valor existir nas opcoes')
    ->expect(PaymentMethodEnum::has(PaymentMethodEnum::random()))->toBeTrue()
    ->group('Unit', 'Enum', 'PaymentMethodEnum', 'Domain', 'Transaction');

test('Deve retornar false quando o valor nao existir nas opcoes')
    ->expect(PaymentMethodEnum::has(count(PaymentMethodEnum::cases()) + 1))
    ->toBeFalse()
    ->group('Unit', 'Enum', 'PaymentMethodEnum', 'Domain', 'Transaction');
