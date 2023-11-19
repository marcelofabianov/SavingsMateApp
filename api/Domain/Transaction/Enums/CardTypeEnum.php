<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Enums;

enum CardTypeEnum: int
{
    case DEBIT = 1;
    case CREDIT = 2;
    case BOTH = 3;
}
