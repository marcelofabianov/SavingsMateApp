<?php

declare(strict_types=1);

use SavingsMate\Domain\Transaction\Enums\CategoryColorEnum;

test('CategoryColorEnum deve conter os cases')
    ->expect(CategoryColorEnum::cases())->toBe([
        CategoryColorEnum::RED,
        CategoryColorEnum::GREEN,
        CategoryColorEnum::BLUE,
        CategoryColorEnum::YELLOW,
        CategoryColorEnum::PURPLE,
        CategoryColorEnum::ORANGE,
        CategoryColorEnum::GRAY,
    ])
    ->group('Unit', 'Enum', 'CategoryColorEnum', 'Domain', 'Transaction');

test('CategoryColorEnum deve retornar um valor aleatório')
    ->expect(CategoryColorEnum::random())->toBeIn(CategoryColorEnum::cases())
    ->group('Unit', 'Enum', 'CategoryColorEnum', 'Domain', 'Transaction');

test('Deve retornar true quando o valor existir nas opcoes')
    ->expect(CategoryColorEnum::has(CategoryColorEnum::random()->value))->toBeTrue()
    ->group('Unit', 'Enum', 'CategoryColorEnum', 'Domain', 'Transaction');

test('Deve retornar false quando o valor nao existir nas opcoes')
    ->expect(CategoryColorEnum::has('invalid'))->toBeFalse()
    ->group('Unit', 'Enum', 'CategoryColorEnum', 'Domain', 'Transaction');
