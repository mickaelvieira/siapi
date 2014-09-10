<?php

namespace spec\SIAPI\Http\Request\Header\Accept\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AcceptMediaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith("test");
        $this->shouldHaveType('SIAPI\Http\Request\Header\Accept\Entity\AcceptMedia');
    }

    function it_should_return_an_empty_string_when_input_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('');
    }

    function it_should_return_the_string_representation()
    {
        $this->beConstructedWith(
            "text/html;mediaparam1=2;mediaparam2=2; q=0.4; extparam=whatever1; extparam2=whatever2"
        );
        $this->getQuality()->shouldBeEqualTo(0.4);
        $this->__toString()->shouldBeEqualTo(
            'text/html;mediaparam1=2;mediaparam2=2;q=0.4;extparam=whatever1;extparam2=whatever2'
        );
    }
}
