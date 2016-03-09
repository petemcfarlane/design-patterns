<?php

namespace spec\DesignPatterns\Interpreter;

use DesignPatterns\Interpreter\Bar;
use DesignPatterns\Interpreter\Playable;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScoreSpec extends ObjectBehavior
{
    function let(Bar $bar1, Bar $bar2)
    {
        $this->beConstructedWith($bar1, $bar2);
    }

    function it_is_playable()
    {
        $this->shouldImplement(Playable::class);
    }
}
