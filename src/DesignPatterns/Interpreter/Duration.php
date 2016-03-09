<?php

namespace DesignPatterns\Interpreter;

class Duration
{
    /**
     * @var float
     */
    private $duration;

    public function __construct(float $duration)
    {
        $this->duration = $duration;
    }

    public static function semibreve()
    {
        return new Duration(1);
    }

    public static function minim()
    {
        return new Duration(0.5);
    }

    public static function crotchet()
    {
        return new Duration(0.25);
    }

    public function duration()
    {
        return $this->duration;
    }
}
