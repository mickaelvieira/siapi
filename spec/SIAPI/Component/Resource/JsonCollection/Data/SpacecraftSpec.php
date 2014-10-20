<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SpacecraftSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Data\Spacecraft');
    }

    function it_should_have_the_right_name_value()
    {
        $this->getName()->shouldBeEqualTo('spacecraft');
    }

    function it_should_have_the_right_prompt_value()
    {
        $this->getPrompt()->shouldBeEqualTo('Spacecraft');
    }

    function it_should_not_be_required()
    {
        $this->shouldNotBeRequired();
    }
}
