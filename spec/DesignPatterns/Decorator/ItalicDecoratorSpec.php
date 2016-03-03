<?php

namespace spec\DesignPatterns\Decorator;

use DesignPatterns\Decorator\Document;
use DesignPatterns\Decorator\DocumentInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ItalicDecoratorSpec extends ObjectBehavior
{
    function let(Document $document)
    {
        $document->title()->willReturn('The Title');
        $document->body()->willReturn('body content');
        $this->beConstructedWith($document);
    }

    function it_is_a_document()
    {
        $this->shouldImplement(DocumentInterface::class);
    }

    function it_should_add_italics_to_the_title()
    {
        $this->title()->shouldReturn('<i>The Title</i>');
    }

    function it_should_leave_the_body_alone()
    {
        $this->body()->shouldReturn('body content');
    }
}
