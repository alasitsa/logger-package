<?php


namespace Logger\Providers;


class LogFileProvider
{
    /**
     * @return string
     */
    public static function provide(): string
    {
        require(__DIR__ . "/../../config/constants.php");
        return (require file_exists(CONFIG_FILE) ? CONFIG_FILE : LOCAL_CONFIG_FILE)["log_file"];
    }
}