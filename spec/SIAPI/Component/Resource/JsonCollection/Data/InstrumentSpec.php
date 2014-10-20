<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstrumentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Data\Instrument');
    }

    function it_should_have_the_right_name_value()
    {
        $this->getName()->shouldBeEqualTo('instrument');
    }

    function it_should_have_the_right_prompt_value()
    {
        $this->getPrompt()->shouldBeEqualTo('Instrument');
    }

    function it_should_not_be_required()
    {
        $this->shouldNotBeRequired();
    }
}
