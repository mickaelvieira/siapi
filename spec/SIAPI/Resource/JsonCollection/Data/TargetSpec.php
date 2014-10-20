<?php

namespace spec\SIAPI\Resource\JsonCollection\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TargetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Data\Target');
    }

    function it_should_have_the_right_name_value()
    {
        $this->getName()->shouldBeEqualTo('target');
    }

    function it_should_have_the_right_prompt_value()
    {
        $this->getPrompt()->shouldBeEqualTo('Target');
    }

    function it_should_not_be_required()
    {
        $this->shouldNotBeRequired();
    }
}
