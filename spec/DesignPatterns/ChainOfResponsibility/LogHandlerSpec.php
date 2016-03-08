<?php

namespace spec\DesignPatterns\ChainOfResponsibility;

use DesignPatterns\ChainOfResponsibility\Command;
use DesignPatterns\ChainOfResponsibility\Handler;
use DesignPatterns\ChainOfResponsibility\Logger;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogHandlerSpec extends ObjectBehavior
{
    function let(Logger $logger, Handler $nextHandler)
    {
        $this->beConstructedWith($logger, $nextHandler);
    }

    function it_is_a_handler()
    {
        $this->shouldHaveType(Handler::class);
    }

    function it_should_log_every_command(Command $command, Logger $logger)
    {
        $command->__toString()->willReturn('Foo command');
        $this->handle($command);

        $logger->log('Foo command')->shouldHaveBeenCalled();
    }

    function it_should_pass_on_every_command(Command $command, Handler $nextHandler)
    {
        $command->__toString()->willReturn('Foo command');
        $this->handle($command);

        $nextHandler->handle($command)->shouldHaveBeenCalled();
    }
}
