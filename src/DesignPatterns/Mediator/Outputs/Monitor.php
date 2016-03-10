<?php declare(strict_types = 1);

namespace DesignPatterns\Mediator\Outputs;

class Monitor implements Output
{
    private $label;

    private function __construct()
    {
    }

    public static function labeled(string $label): Monitor
    {
        $monitor = new Monitor();

        $monitor->label = $label;

        return $monitor;
    }

    public function label(string $label = null)
    {
        if (is_null($label)) {
            return $this->label;
        }
        $this->label = $label;
    }
}
