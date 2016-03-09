<?php

namespace spec\DesignPatterns\Interpreter;

use DesignPatterns\Interpreter\Pitch;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PitchSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedFromPitch('E4');
    }
    function it_must_be_constructed_with_a_valid_pitch()
    {
        $this->beConstructedFromPitch('FOObar');
        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_can_be_represented_as_a_string()
    {
        $this->__toString()->shouldReturn('E4');
    }

    function it_can_return_the_next_pitch_up_from_itself()
    {
        $f = $this->next();
        $f->shouldBeLike(Pitch::fromPitch('F4'));

        $fSharp = $f->next();
        $fSharp->shouldBeLike(Pitch::fromPitch('F#4'));

        $g = $fSharp->next();
        $g->shouldBeLike(Pitch::fromPitch('G4'));

        $gSharp = $g->next();
        $gSharp->shouldBeLike(Pitch::fromPitch('G#4'));

        $a = $gSharp->next();
        $a->shouldBeLike(Pitch::fromPitch('A5'));
    }

    function it_can_add_semitones_to_a_pitch()
    {
        $this->beConstructedFromPitch('E2');
        $d3 = $this->addSemiTones(10);
        $d3->shouldBeLike(Pitch::fromPitch('D3'));

        $fSharp3 = $d3->addSemiTones(4);
        $fSharp3->shouldBeLike(Pitch::fromPitch('F#3'));
    }
}
