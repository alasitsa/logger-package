<?php


namespace Logger\Services;


use Logger\Entities\Log;

interface ILogsService
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param int $id
     *
     * @return Log
     */
    public function get(int $id): Log;

    /**
     * @param Log $log
     *
     * @return void
     */
    public function add(Log $log): void;
}