<?php

namespace DesignPatterns\Interpreter;

class Score implements Playable
{
    /**
     * @var Bar[]
     */
    private $bars;

    public function __construct(Bar ...$bars)
    {
        $this->bars = $bars;
    }

    public function play()
    {
        foreach ($this->bars as $bar) {
            $bar->play();
        }
    }
}
