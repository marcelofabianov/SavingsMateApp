<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum CardScopeEnum: int
{
    case NATIONAL = 1;
    case INTERNATIONAL = 2;
    case BOTH = 3;
}
