<?php

namespace DesignPatterns\Memento;

class Roadie
{
    /**
     * @var GuitarAmplifier
     */
    private $amplifier;

    /**
     * @var Preset[]
     */
    private $presets = [];

    public function __construct(GuitarAmplifier $amplifier)
    {
        $this->amplifier = $amplifier;
    }

    public function remember($name)
    {
        $this->presets[$name] = $this->amplifier->savePreset();
    }

    public function recall($name)
    {
        $this->amplifier->fromPreset($this->presets[$name]);
    }
}
