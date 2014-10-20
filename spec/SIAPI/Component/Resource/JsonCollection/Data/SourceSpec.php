<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SourceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Data\Source');
    }

    function it_should_have_the_right_name_value()
    {
        $this->getName()->shouldBeEqualTo('source');
    }

    function it_should_have_the_right_prompt_value()
    {
        $this->getPrompt()->shouldBeEqualTo('Source');
    }

    function it_should_not_be_required()
    {
        $this->shouldNotBeRequired();
    }
}
