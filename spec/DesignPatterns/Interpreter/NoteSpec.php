<?php

namespace spec\DesignPatterns\Interpreter;

use DesignPatterns\Interpreter\Duration;
use DesignPatterns\Interpreter\Pitch;
use DesignPatterns\Interpreter\Playable;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NoteSpec extends ObjectBehavior
{
    function let(Pitch $pitch, Duration $duration)
    {
        $pitch->__toString()->willReturn('E5');
        $duration->duration()->willReturn(0.5);
        $this->beConstructedWith($pitch, $duration);
    }

    function it_can_be_played()
    {
        $this->shouldImplement(Playable::class);
    }
}
