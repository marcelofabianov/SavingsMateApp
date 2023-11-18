<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use Exception;
use SavingsMate\Domain\Core\Exceptions\CoreValueObjectException;
use SavingsMate\Domain\Core\ValueObject;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICoreValueObjectException;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IEmail;

final readonly class Email extends ValueObject implements IEmail
{
    private function __construct(
        private string $value
    ) {
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(IEmail $other): bool
    {
        return $this->value === $other->getValue();
    }

    public static function validate(string $email): bool
    {
        if (filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    /**
     * @throws Exception
     */
    public static function random(): IEmail
    {
        $random = bin2hex(random_bytes(16)).'@email.com';

        return self::create($random);
    }

    /**
     * @throws ICoreValueObjectException
     */
    public static function create(string|IEmail $value): IEmail
    {
        if ($value instanceof IEmail) {
            return $value;
        }

        if (! self::validate($value)) {
            throw CoreValueObjectException::invalidValue('Email', $value);
        }

        return new self($value);
    }
}
