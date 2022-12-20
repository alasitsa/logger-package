<?php


namespace Logger\Providers;


class LogFileProvider
{
    /**
     * @return string
     */
    public static function provide(): string
    {
        return (require(__DIR__ . '/../../config/config.php'))["log_file"];
    }
}