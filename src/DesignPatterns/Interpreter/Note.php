<?php

namespace DesignPatterns\Interpreter;

class Note implements Playable
{
    const BPM = 100;
    const BEATS_PER_BAR = 4;

    /**
     * @var Pitch
     */
    private $pitch;

    /**
     * @var Duration
     */
    private $duration;

    public function __construct(Pitch $pitch, Duration $duration)
    {
        $this->pitch = $pitch;
        $this->duration = $duration;
    }

    public function play()
    {
        echo sprintf('Playing %s for %f seconds', $this->pitch->__toString(), $this->duration) . PHP_EOL;
        usleep($this->duration->duration() * 1000000 * 60 / self::BPM * self::BEATS_PER_BAR);
    }
}
