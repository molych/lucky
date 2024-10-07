<?php

namespace App\Helpers;

class PasswordHelper
{
    /**
     * Ensure the password is a string.
     *
     * @param  mixed  $password
     * @return string
     * @throws \InvalidArgumentException
     */
    public static function ensureString(mixed $password): string
    {
        if (!is_string($password)) {
            throw new \InvalidArgumentException('Password must be a string.');
        }

        return $password;
    }
}
