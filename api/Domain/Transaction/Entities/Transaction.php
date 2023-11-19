<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Transaction\Entities;

use DateTimeInterface;
use SavingsMate\Domain\Core\Entity;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\ICreatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUpdatedAt;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IUuid;
use SavingsMate\Domain\Interfaces\Transaction\Dto\ICreateTransactionDto;
use SavingsMate\Domain\Interfaces\Transaction\Entities\ITransaction;
use SavingsMate\Domain\Interfaces\Transaction\Exceptions\ITransactionEntityException;
use SavingsMate\Domain\Transaction\Enums\PaymentMethodEnum;
use SavingsMate\Domain\Transaction\Enums\PaymentTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionRecurrenceEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionStatusEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionTypeEnum;
use SavingsMate\Domain\Transaction\Enums\TransactionValueTypeEnum;
use SavingsMate\Domain\Transaction\Exceptions\TransactionEntityException;
use Throwable;

final readonly class Transaction extends Entity implements ITransaction
{
    private function __construct(
        private IUuid $id,
        private IUuid $userId,
        private IUuid $categoryId,
        private IUuid $supplierId,
        private ?IUuid $cardId,
        private ?IUuid $bankAccountId,
        private ?IUuid $installmentId,
        private ?IUuid $subscriptionId,
        private ?IUuid $internalTransferId,
        private float $amount,
        private ?DateTimeInterface $expectedAt,
        private ?DateTimeInterface $confirmedAt,
        private ?DateTimeInterface $cancelledAt,
        private ?DateTimeInterface $reversedAt,
        private string $description,
        private PaymentMethodEnum $paymentMethod,
        private PaymentTypeEnum $paymentType,
        private TransactionValueTypeEnum $valueType,
        private TransactionStatusEnum $status,
        private TransactionRecurrenceEnum $recurrence,
        private TransactionTypeEnum $type,
        private ICreatedAt $createdAt,
        private IUpdatedAt $updatedAt
    ) {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'userId' => $this->userId->getValue(),
            'categoryId' => $this->categoryId->getValue(),
            'supplierId' => $this->supplierId->getValue(),
            'cardId' => $this->cardId?->getValue(),
            'bankAccountId' => $this->bankAccountId?->getValue(),
            'installmentId' => $this->installmentId?->getValue(),
            'subscriptionId' => $this->subscriptionId?->getValue(),
            'internalTransferId' => $this->internalTransferId?->getValue(),
            'amount' => $this->amount,
            'expectedAt' => $this->expectedAt?->format('Y-m-d H:i:s'),
            'confirmedAt' => $this->confirmedAt?->format('Y-m-d H:i:s'),
            'cancelledAt' => $this->cancelledAt?->format('Y-m-d H:i:s'),
            'reversedAt' => $this->reversedAt?->format('Y-m-d H:i:s'),
            'description' => $this->description,
            'paymentMethod' => $this->paymentMethod->value,
            'paymentType' => $this->paymentType->value,
            'valueType' => $this->valueType->value,
            'status' => $this->status->value,
            'recurrence' => $this->recurrence->value,
            'type' => $this->type->value,
            'createdAt' => $this->createdAt->format(),
            'updatedAt' => $this->updatedAt->format(),
        ];
    }

    /**
     * @throws ITransactionEntityException
     */
    public static function create(ICreateTransactionDto $dto): ITransaction
    {
        try {
            return new self(
                id: $dto->id,
                userId: $dto->userId,
                categoryId: $dto->categoryId,
                supplierId: $dto->supplierId,
                cardId: $dto->cardId,
                bankAccountId: $dto->bankAccountId,
                installmentId: $dto->installmentId,
                subscriptionId: $dto->subscriptionId,
                internalTransferId: $dto->internalTransferId,
                amount: $dto->amount,
                expectedAt: $dto->expectedAt,
                confirmedAt: $dto->confirmedAt,
                cancelledAt: $dto->cancelledAt,
                reversedAt: $dto->reversedAt,
                description: $dto->description,
                paymentMethod: $dto->paymentMethod,
                paymentType: $dto->paymentType,
                valueType: $dto->valueType,
                status: $dto->status,
                recurrence: $dto->recurrence,
                type: $dto->type,
                createdAt: $dto->createdAt,
                updatedAt: $dto->updatedAt
            );
        } catch (Throwable) {
            throw TransactionEntityException::InvalidEntity(__CLASS__);
        }
    }
}
