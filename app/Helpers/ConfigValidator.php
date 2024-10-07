<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class ConfigValidator
{
    /**
     * Validate and retrieve the history count from the configuration.
     *
     * @return int
     * @throws \InvalidArgumentException
     */
    public static function getValidatedHistoryCount(): int
    {
        $historyCount = Config::get('settings.history_count');

        if (!is_numeric($historyCount)) {
            throw new \InvalidArgumentException('The history_count setting must be a numeric value.');
        }

        return (int) $historyCount;
    }
}
