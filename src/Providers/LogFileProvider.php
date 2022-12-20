<?php


namespace Logger\Providers;


class LogFileProvider
{
    public static function provide() {
        return (require (__DIR__ . '/../../config/config.php'))["log_file"];
    }
}