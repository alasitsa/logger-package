<?php


namespace Logger\Providers;

use Logger\Logger;
use Logger\Services\DBLogsService;
use Logger\Services\FileLogsService;
use Logger\Services\ILogsService;

class LoggerProvider
{
    private static array $services = [
        ILogsService::class => DBLogsService::class
    ];

    private static array $providers = [
        DBLogsService::class => EntityManagerProvider::class,
        FileLogsService::class => LogFileProvider::class
    ];

    /**
     * @return Logger
     */
    public static function provide(): Logger
    {
        $service_class = self::$services[ILogsService::class];
        $service = new $service_class(self::$providers[$service_class]::provide());
        return new Logger($service);
    }
}