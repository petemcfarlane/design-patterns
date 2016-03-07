<?php

namespace DesignPatterns\Memento;

class GuitarAmplifier
{
    private $gain = 5;
    private $treble = 5;
    private $mid = 5;
    private $bass = 5;
    private $level = 5;

    /**
     * @return Preset
     */
    public function savePreset()
    {
        return new Preset([
            'gain' => $this->gain,
            'treble' => $this->treble,
            'mid' => $this->mid,
            'bass' => $this->bass,
            'level' => $this->level
        ]);
    }

    /**
     * @param Preset $preset
     */
    public function fromPreset(Preset $preset)
    {
        $settings = $preset->getSettings();

        $this->gain = $settings['gain'];
        $this->treble = $settings['treble'];
        $this->mid = $settings['mid'];
        $this->bass = $settings['bass'];
        $this->level = $settings['level'];
    }

    public function gain()
    {
        return $this->gain;
    }

    public function treble()
    {
        return $this->treble;
    }

    public function mid()
    {
        return $this->mid;
    }

    public function bass()
    {
        return $this->bass;
    }

    public function level()
    {
        return $this->level;
    }
}
