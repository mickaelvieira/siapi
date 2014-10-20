<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MissionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Data\Mission');
    }

    function it_should_have_the_right_name_value()
    {
        $this->getName()->shouldBeEqualTo('mission');
    }

    function it_should_have_the_right_prompt_value()
    {
        $this->getPrompt()->shouldBeEqualTo('Mission');
    }

    function it_should_not_be_required()
    {
        $this->shouldNotBeRequired();
    }
}
