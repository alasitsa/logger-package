<?php


namespace Logger\Providers;


class LogFileProvider
{
    /**
     * @return string
     */
    public static function provide(): string
    {
        return (file_exists(CONFIG_FILE) ? CONFIG_FILE : LOCAL_CONFIG_FILE)["log_file"];
    }
}