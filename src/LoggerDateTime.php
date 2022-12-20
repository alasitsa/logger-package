<?php


namespace Logger;


use DateTime;

class LoggerDateTime extends DateTime
{
    public function __toString(): string
    {
        return $this->format('Y-m-d H:i:s');
    }
}