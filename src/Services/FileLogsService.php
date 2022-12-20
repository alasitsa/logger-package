<?php


namespace Logger\Services;


use Logger\Entities\Log;
use Logger\Helpers\CsvHelper;

class FileLogsService implements ILogsService
{
    private string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function getAll(): array
    {
        return CsvHelper::readCsv($this->file);
    }

    public function get(int $id): Log
    {
        return array_filter($this->getAll(), function ($item) use ($id) {
            return $item["id"] == $id;
        })[0];
    }

    public function add(Log $log)
    {
        $logs = $this->getAll();
        $local_log[] = (int)($logs[count($logs)-1][0] ?? 0) + 1;
        $local_log[] = $log->getLevel();
        $local_log[] = $log->getMessage();
        $local_log[] = $log->getCreatedAt();
        CsvHelper::appendCsv($this->file, $local_log);
    }
}