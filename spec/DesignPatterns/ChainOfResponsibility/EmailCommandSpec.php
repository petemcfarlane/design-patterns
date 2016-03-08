<?php

namespace spec\DesignPatterns\ChainOfResponsibility;

use DesignPatterns\ChainOfResponsibility\Command;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailCommandSpec extends ObjectBehavior
{
    function it_is_a_command()
    {
        $this->shouldHaveType(Command::class);
    }

    function it_sends_an_email()
    {
        $this->send();
    }
}
