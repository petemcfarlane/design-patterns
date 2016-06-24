<?php

namespace DesignPatterns\State;

class DigitalMixingDesk
{
    public function loadPreset(Preset $preset)
    {
        $this->state = $preset;
    }

    public function saveAs($argument1)
    {
        // TODO: write logic here
    }
}
