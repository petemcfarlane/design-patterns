<?php

namespace spec\DesignPatterns\Interpreter;

use DesignPatterns\Interpreter\Note;
use DesignPatterns\Interpreter\Playable;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BarSpec extends ObjectBehavior
{
    function let(Note $note1, Note $note2)
    {
        $this->beConstructedWith($note1, $note2);
    }

    function it_is_playable()
    {
        $this->shouldImplement(Playable::class);
    }
}
