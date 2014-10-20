<?php

namespace spec\SIAPI\Resource\JsonCollection\Link\Image;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JpegSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Link\Image\Jpeg');
    }

    function it_should_have_the_right_relation_type_value()
    {
        $this->getRel()->shouldBeEqualTo('item');
    }

    function it_should_have_the_right_media_type_value()
    {
        $this->getType()->shouldBeEqualTo('image/jpeg');
    }

    function it_should_have_the_right_render_type_value()
    {
        $this->getRender()->shouldBeEqualTo('image');
    }
}
