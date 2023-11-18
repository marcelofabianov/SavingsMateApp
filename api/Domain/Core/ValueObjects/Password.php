<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use Exception;
use Illuminate\Support\Str;
use SavingsMate\Domain\Core\Exceptions\CorePasswordException;
use SavingsMate\Domain\Core\ValueObject;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICorePasswordException;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IPassword;

final readonly class Password extends ValueObject implements IPassword
{
    private const MIN_LENGTH = 8;

    private const MAX_LENGTH = 24;

    private const PASSWORD_CONTAINS_LETTER = true;

    private const PASSWORD_CONTAINS_NUMBER = true;

    private const PASSWORD_CONTAINS_SYMBOL = true;

    private const PASSWORD_CONTAINS_SPACES = false;

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

    public function equals(IPassword $other): bool
    {
        return $this->value === $other->getValue();
    }

    private static function validateSymbols(string $value): bool
    {
        return Str::contains($value, ['~', '!', '#', '$', '%', '^', '&', '*', '(', ')', '-',
            '_', '.', ',', '<', '>', '?', '/', '\\', '{', '}', '[',
            ']', '|', ':', ';']);
    }

    private static function validateNumbers(string $value): bool
    {
        return Str::contains($value, ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9']);
    }

    private static function validateLettersUppercase(string $value): bool
    {
        $letters = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
            'K', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'X', 'Y', 'Z',
        ];

        if (Str::contains($value, $letters)) {
            return true;
        }

        return false;
    }

    private static function validateLettersLowercase(string $value): bool
    {
        $letters = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
            'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
            'u', 'v', 'x', 'y', 'z',
        ];

        if (Str::contains($value, $letters)) {
            return true;
        }

        return false;
    }

    public static function validate(string $value): bool
    {
        if (Str::contains($value, ' ')) {
            return false;
        }

        if (! self::validateLettersLowercase($value)) {
            return false;
        }

        if (! self::validateLettersUppercase($value)) {
            return false;
        }

        if (! self::validateNumbers($value)) {
            return false;
        }

        if (! self::validateSymbols($value)) {
            return false;
        }

        return Str::length($value) >= self::MIN_LENGTH && Str::length($value) <= self::MAX_LENGTH;
    }

    /**
     * @throws Exception
     */
    public static function random(): IPassword
    {
        $random = Str::password(
            length: random_int(self::MIN_LENGTH, random_int(11, self::MAX_LENGTH)),
            letters: self::PASSWORD_CONTAINS_LETTER,
            numbers: self::PASSWORD_CONTAINS_NUMBER,
            symbols: self::PASSWORD_CONTAINS_SYMBOL,
            spaces: self::PASSWORD_CONTAINS_SPACES
        );

        return self::create($random);
    }

    /**
     * @throws ICorePasswordException
     */
    public static function create(string|IPassword $value): IPassword
    {
        if ($value instanceof IPassword) {
            return $value;
        }

        if (! self::validate($value)) {
            throw CorePasswordException::badPassword();
        }

        return new self($value);
    }
}
