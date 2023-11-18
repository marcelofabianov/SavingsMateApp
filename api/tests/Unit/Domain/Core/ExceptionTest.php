<?php

declare(strict_types=1);

test('Classes de Exceptions devem implementar a interface ISavingsMateException')
    ->expect('SavingsMate\Domain\Exceptions')
    ->toImplement(SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException::class)
    ->and('SavingsMate\Domain\Core\Exceptions')
    ->toImplement(SavingsMate\Domain\Interfaces\Exceptions\ISavingsMateException::class);

test('Classes de Exceptions devem extender a classe base SavingsMateException')
    ->expect('SavingsMate\Domain\Core\Exceptions')
    ->toExtend(SavingsMate\Domain\Exceptions\SavingsMateException::class);

test('Classes de Exceptions devem conter o sufixo Exception')
    ->expect('SavingsMate\Domain\Core\Exceptions')
    ->toHaveSuffix('Exception')
    ->and('SavingsMate\Domain\Exceptions')
    ->toHaveSuffix('Exception');

test('Classes de Exceptions devem ser final')
    ->expect('SavingsMate\Domain\Core\Exceptions')
    ->toBeFinal();
