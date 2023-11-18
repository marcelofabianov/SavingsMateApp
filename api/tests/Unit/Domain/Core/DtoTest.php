<?php

declare(strict_types=1);

test('Toda classe DTO deve conter o sufixo Dto')
    ->expect('SavingsMate\Domain\Core\Dto')
    ->toHaveSuffix('Dto');

test('Toda classe DTO deve implementar a interface IDto')
    ->expect('SavingsMate\Domain\Core\Dto')
    ->toImplement(SavingsMate\Domain\Interfaces\Core\IDto::class);
