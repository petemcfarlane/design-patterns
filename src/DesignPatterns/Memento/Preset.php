<?php

namespace DesignPatterns\Memento;

class Preset
{
    private $settings;

    public function __construct(array $settings)
    {
        $this->settings = $settings;
    }

    public function getSettings()
    {
        return $this->settings;
    }
}
