<?php

namespace spec\DesignPatterns\Builder;

use DesignPatterns\Builder\CurlCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CurlBuilderSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWithUrl('google.com');
    }

    function it_can_build_a_CurlCommand()
    {
        $this->build()->shouldHaveType(CurlCommand::class);
    }

    function it_can_build_with_data()
    {
        $this->withData(['foo' => 'bar'])->shouldReturn($this);
        $command = $this->build();
        $command->options()->shouldBeLike(['data' => ['foo' => 'bar'], 'method' => 'GET']);
    }

    function it_can_change_the_request_method()
    {
        $this->withMethod('POST')->shouldReturn($this);
        $command = $this->build();
        $command->options()->shouldContain('POST');
    }

    function it_can_build_an_immutable_curl_command()
    {
        $command1 = $this->build();
        $this->build()->shouldNotEqual($command1);
    }
}
