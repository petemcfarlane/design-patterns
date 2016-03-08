<?php

namespace spec\DesignPatterns\ChainOfResponsibility;

use DesignPatterns\ChainOfResponsibility\Command;
use DesignPatterns\ChainOfResponsibility\Handler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FinalHandlerSpec extends ObjectBehavior
{
    function it_is_a_handler()
    {
        $this->shouldHaveType(Handler::class);
    }

    function it_throws_an_exception_if_handle_is_called(Command $command)
    {
        $command->__toString()->willReturn('Foo command');
        $this->shouldThrow(\LogicException::class)->during('handle', [$command]);
    }
}
