<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Dto;

use DateTimeInterface;
use Exception;
use SavingsMate\Domain\Core\ValueObjects\CreatedAt;
use SavingsMate\Domain\Core\ValueObjects\UpdatedAt;
use SavingsMate\Domain\Core\ValueObjects\Uuid;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateTransactionDto;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionDtoException;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;
use SavingsMate\Domain\Transaction\Exceptions\TransactionDtoException;

final readonly class CreateTransactionDto implements ICreateTransactionDto
{
    public IUuid $userId;

    public IUuid $categoryId;

    public IUuid $supplierId;

    public ?IUuid $cardId;

    public ?IUuid $bankAccountId;

    public ?IUuid $installmentId;

    public ?IUuid $subscriptionId;

    public ?IUuid $internalTransferId;

    public float $amount;

    public string $description;

    public PaymentMethodEnum $paymentMethod;

    public PaymentTypeEnum $paymentType;

    public TransactionValueTypeEnum $valueType;

    public TransactionStatusEnum $status;

    public TransactionRecurrenceEnum $recurrence;

    public TransactionTypeEnum $type;

    public IUuid $id;

    public ?DateTimeInterface $expectedAt;

    public ?DateTimeInterface $confirmedAt;

    public ?DateTimeInterface $cancelledAt;

    public ?DateTimeInterface $reversedAt;

    public ICreatedAt $createdAt;

    public IUpdatedAt $updatedAt;

    /**
     * @throws ITransactionDtoException
     */
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
    ) {
        try {
            $this->userId = $userId;
            $this->categoryId = $categoryId;
            $this->supplierId = $supplierId;
            $this->cardId = $cardId;
            $this->bankAccountId = $bankAccountId;
            $this->installmentId = $installmentId;
            $this->subscriptionId = $subscriptionId;
            $this->internalTransferId = $internalTransferId;
            $this->amount = $amount;
            $this->description = $description;
            $this->paymentMethod = $paymentMethod;
            $this->paymentType = $paymentType;
            $this->valueType = $valueType;
            $this->status = $status;
            $this->recurrence = $recurrence;
            $this->type = $type;
            $this->id = $id ?? Uuid::random();
            $this->expectedAt = $expectedAt;
            $this->confirmedAt = $confirmedAt;
            $this->cancelledAt = $cancelledAt;
            $this->reversedAt = $reversedAt;
            $this->createdAt = $createdAt ?? CreatedAt::now();
            $this->updatedAt = $updatedAt ?? UpdatedAt::now();
        } catch (Exception $exception) {
            throw TransactionDtoException::invalid($exception->getMessage());
        }
    }
}
