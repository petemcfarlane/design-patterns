<?php

namespace spec\DesignPatterns\Decorator;

use DesignPatterns\Decorator\Document;
use DesignPatterns\Decorator\DocumentInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BoldDecoratorSpec extends ObjectBehavior
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

    function it_adds_bold_tags_to_the_title()
    {
        $this->title()->shouldBe('<b>The Title</b>');
    }

    function it_does_nothing_to_the_body()
    {
        $this->body()->shouldReturn('body content');
    }
}
