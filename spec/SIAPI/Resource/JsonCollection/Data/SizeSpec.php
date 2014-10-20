<?php

namespace spec\SIAPI\Resource\JsonCollection\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SizeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Data\Size');
    }

    function it_should_have_the_right_name_value()
    {
        $this->getName()->shouldBeEqualTo('size');
    }

    function it_should_have_the_right_prompt_value()
    {
        $this->getPrompt()->shouldBeEqualTo('Size');
    }

    function it_should_not_be_required()
    {
        $this->shouldBeRequired();
    }
}
