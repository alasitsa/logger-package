<?php


namespace Logger;


use DateTime;
use Logger\Entities\Log;
use Logger\Services\ILogsService;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    private ILogsService $service;

    public function __construct(ILogsService $service)
    {
        $this->service = $service;
    }

    public function log($level, $message, array $context = array())
    {
        $log = new Log();
        $log->setLevel($level);
        $log->setMessage($message);
        $log->setCreatedAt(new DateTime());
        $this->service->add($log);
    }
}