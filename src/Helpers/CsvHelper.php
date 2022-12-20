<?php


namespace Logger\Helpers;


class CsvHelper
{
    public static function readCsv(string $file): array
    {
        if(!file_exists($file))
            file_put_contents($file, "");

        $content_array = explode("\n", file_get_contents($file));
        $content_output = [];
        foreach($content_array as $item) {
            $content_output[] = explode(";", $item);
        }
        return $content_output;
    }

    public static function writeCsv(string $file, array $content) {
        $content_array = [];
        foreach($content as $item) {
            $content_array[] = implode(";", $item);
        }
        file_put_contents($file, trim(implode("\n", $content_array)));
    }

    public static function appendCsv(string $file, $row) {
        $content = self::readCsv($file);
        array_push($content, $row);
        self::writeCsv($file, $content);
    }
}