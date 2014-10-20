<?php

namespace spec\SIAPI\Resource\JsonCollection\Query\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SizeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Query\Data\Size');
        $this->shouldBeAnInstanceOf('SIAPI\Resource\JsonCollection\Data\Size');
    }

    function it_should_have_a_value_equal_to_a_empty_string()
    {
        $this->getValue()->shouldBeEqualTo('');
    }
}
