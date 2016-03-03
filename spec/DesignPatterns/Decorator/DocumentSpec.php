<?php

namespace spec\DesignPatterns\Decorator;

use DesignPatterns\Decorator\DocumentInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('The Title', 'The body');
    }

    function it_is_a_document()
    {
        $this->shouldImplement(DocumentInterface::class);
    }

    function it_has_a_title()
    {
        $this->title()->shouldBe('The Title');
    }

    function it_has_a_body()
    {
        $this->body()->shouldBe('The body');
    }
}
