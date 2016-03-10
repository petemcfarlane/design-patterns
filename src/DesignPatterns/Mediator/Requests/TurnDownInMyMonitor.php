<?php

namespace DesignPatterns\Mediator\Requests;

class TurnDownInMyMonitor implements Request
{
    /**
     * @var string
     */
    private $label;

    private function __construct(string $label)
    {
        $this->label = $label;
    }

    public static function channel(string $label)
    {
        return new TurnDownInMyMonitor($label);
    }

    public function label(): string
    {
        return $this->label;
    }
}
