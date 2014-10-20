<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Query\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstrumentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Query\Data\Instrument');
        $this->shouldBeAnInstanceOf('SIAPI\Component\Resource\JsonCollection\Data\Instrument');
    }

    function it_should_have_a_value_equal_to_a_empty_string()
    {
        $this->getValue()->shouldBeEqualTo('');
    }

    function it_should_have_a_data_list_defined()
    {
        $this->getList()->shouldReturnAnInstanceOf('SIAPI\Component\Resource\JsonCollection\Query\ListData\Instrument');
    }
}
