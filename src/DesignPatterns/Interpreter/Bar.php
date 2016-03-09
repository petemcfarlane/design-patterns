<?php

namespace DesignPatterns\Interpreter;

class Bar implements Playable
{
    /**
     * @var Note[]
     */
    private $notes;

    public function __construct(Note ...$notes)
    {
        $this->notes = $notes;
    }

    public function play()
    {
        foreach($this->notes as $note) {
            $note->play();
        };
    }
}
