<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Link;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NextSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Link\Next');
    }

    function it_should_have_the_right_relation_type_value()
    {
        $this->getRel()->shouldBeEqualTo('next');
    }

    function it_should_have_the_right_media_type_value()
    {
        $this->getType()->shouldBeEqualTo('application/vnd.collection.next+json');
    }

    function it_should_have_the_right_render_type_value()
    {
        $this->getRender()->shouldBeEqualTo('link');
    }
}
