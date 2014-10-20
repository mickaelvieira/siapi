<?php

namespace spec\SIAPI\Resource\JsonCollection\Query\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MissionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Query\Data\Mission');
        $this->shouldBeAnInstanceOf('SIAPI\Resource\JsonCollection\Data\Mission');
    }

    function it_should_have_a_value_equal_to_a_empty_string()
    {
        $this->getValue()->shouldBeEqualTo('');
    }
}
