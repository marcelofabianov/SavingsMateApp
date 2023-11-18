<?php

declare(strict_types=1);

namespace SavingsMate\Domain\Core\ValueObjects;

use Exception;
use Illuminate\Support\Str;
use SavingsMate\Domain\Core\Exceptions\CorePasswordException;
use SavingsMate\Domain\Core\ToStringJson;
use SavingsMate\Domain\Interfaces\Core\Exceptions\ICorePasswordException;
use SavingsMate\Domain\Interfaces\Core\ValueObjects\IPassword;

final class Password implements IPassword
{
    use ToStringJson;

    private const MIN_LENGTH = 8;

    private const MAX_LENGTH = 24;

    private const PASSWORD_CONTAINS_LETTER = true;

    private const PASSWORD_CONTAINS_NUMBER = true;

    private const PASSWORD_CONTAINS_SYMBOL = true;

    private const PASSWORD_CONTAINS_SPACES = false;

    private static string $message;

    private function __construct(
        private readonly string $value
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
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        ];

        if (Str::contains($value, $letters)) {
            return true;
        }

        return false;
    }

    private static function validateLettersLowercase(string $value): bool
    {
        $letters = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        ];

        if (Str::contains($value, $letters)) {
            return true;
        }

        return false;
    }

    public static function validate(string $value): bool
    {
        if (Str::contains($value, ' ')) {
            self::$message = 'Password cannot contain spaces';

            return false;
        }

        if (! self::validateLettersLowercase($value)) {
            self::$message = 'Password must contain at least one lowercase letter';

            return false;
        }

        if (! self::validateLettersUppercase($value)) {
            self::$message = 'Password must contain at least one uppercase letter';

            return false;
        }

        if (! self::validateNumbers($value)) {
            self::$message = 'Password must contain at least one number';

            return false;
        }

        if (! self::validateSymbols($value)) {
            self::$message = 'Password must contain at least one symbol';

            return false;
        }

        if (! (Str::length($value) >= self::MIN_LENGTH)) {
            self::$message = 'Password must contain at least '.self::MIN_LENGTH.' characters';

            return false;
        }

        return true;
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

        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '~!#$%^&*()-_./<>?/\\{}[]|:;';

        $random .= $lowercase[random_int(0, strlen($lowercase) - 1)];
        $random .= $uppercase[random_int(0, strlen($uppercase) - 1)];
        $random .= $numbers[random_int(0, strlen($numbers) - 1)];
        $random .= $specialChars[random_int(0, strlen($specialChars) - 1)];

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
            throw CorePasswordException::badPassword($value, self::$message);
        }

        return new self($value);
    }
}
