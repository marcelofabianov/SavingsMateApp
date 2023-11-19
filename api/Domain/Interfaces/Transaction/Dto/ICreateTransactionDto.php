<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Interfaces\Transaction\Dto;

use DateTimeInterface;
use SavingsMate\Domain\Interfaces\Core\IDto;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;

/**
 * @property-read IUuid $userId
 * @property-read IUuid $categoryId
 * @property-read IUuid $supplierId
 * @property-read IUuid|null $cardId
 * @property-read IUuid|null $bankAccountId
 * @property-read IUuid|null $installmentId
 * @property-read IUuid|null $subscriptionId
 * @property-read IUuid|null $internalTransferId
 * @property-read float $amount
 * @property-read string $description
 * @property-read PaymentMethodEnum $paymentMethod
 * @property-read PaymentTypeEnum $paymentType
 * @property-read TransactionValueTypeEnum $valueType
 * @property-read TransactionStatusEnum $status
 * @property-read TransactionRecurrenceEnum $recurrence
 * @property-read TransactionTypeEnum $type
 * @property-read IUuid $id
 * @property-read DateTimeInterface|null $expectedAt
 * @property-read DateTimeInterface|null $confirmedAt
 * @property-read DateTimeInterface|null $cancelledAt
 * @property-read DateTimeInterface|null $reversedAt
 * @property-read ICreatedAt $createdAt
 * @property-read IUpdatedAt $updatedAt
 */
interface ICreateTransactionDto extends IDto
{
    public function __construct(
        IUuid $userId,
        IUuid $categoryId,
        IUuid $supplierId,
        ?IUuid $cardId,
        ?IUuid $bankAccountId,
        ?IUuid $installmentId,
        ?IUuid $subscriptionId,
        ?IUuid $internalTransferId,
        float $amount,
        string $description,
        PaymentMethodEnum $paymentMethod,
        PaymentTypeEnum $paymentType,
        TransactionValueTypeEnum $valueType,
        TransactionStatusEnum $status,
        TransactionRecurrenceEnum $recurrence,
        TransactionTypeEnum $type,
        ?IUuid $id = null,
        ?DateTimeInterface $expectedAt = null,
        ?DateTimeInterface $confirmedAt = null,
        ?DateTimeInterface $cancelledAt = null,
        ?DateTimeInterface $reversedAt = null,
        ?ICreatedAt $createdAt = null,
        ?IUpdatedAt $updatedAt = null
    );
}
