<?php

namespace Logger;

use Logger\Entities\Log;
use Logger\Services\ILogsService;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    private ILogsService $service;

    /**
     * Logger constructor.
     *
     * @param ILogsService $service
     */
    public function __construct(ILogsService $service)
    {
        $this->service = $service;
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        $log = new Log();
        $log->setLevel($level);
        $log->setMessage($message);
        $log->setCreatedAt(new LoggerDateTime());
        $this->service->add($log);
    }
}