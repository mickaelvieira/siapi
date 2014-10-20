<?php

namespace spec\SIAPI\Resource\JsonCollection\Template\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstrumentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Template\Data\Instrument');
        $this->shouldBeAnInstanceOf('SIAPI\Resource\JsonCollection\Data\Instrument');
    }

    function it_should_have_a_value_equal_to_a_empty_string()
    {
        $this->getValue()->shouldBeEqualTo('');
    }
}
