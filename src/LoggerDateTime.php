<?php


namespace Logger;


use DateTime;

class LoggerDateTime extends DateTime
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->format('Y-m-d H:i:s');
    }
}