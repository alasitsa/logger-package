<?php


namespace Logger\Services;


use Logger\Entities\Log;

interface ILogsService
{
    public function getAll(): array;
    public function get(int $id): Log;
    public function add(Log $log);
}