<?php

namespace spec\DesignPatterns\ChainOfResponsibility;

use DesignPatterns\ChainOfResponsibility\EmailCommand;
use DesignPatterns\ChainOfResponsibility\Handler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailHandlerSpec extends ObjectBehavior
{
    function let(Handler $nextHandler)
    {
        $this->beConstructedWith($nextHandler);
    }

    function it_is_a_handler()
    {
        $this->shouldHaveType(Handler::class);
    }

    function it_handles_an_email_command(EmailCommand $emailCommand)
    {
        $this->handle($emailCommand);

        $emailCommand->send()->shouldHaveBeenCalled();
    }

    function it_does_not_pass_an_email_command_to_the_next_handler(EmailCommand $emailCommand, Handler $nextHandler)
    {
        $this->handle($emailCommand);

        $nextHandler->handle($emailCommand)->shouldNotHaveBeenCalled();

    }
}
