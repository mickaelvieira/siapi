<?php

namespace spec\SIAPI\Component\Search\Result;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageSpec extends ObjectBehavior
{
    function it_is_initializable_with_an_id()
    {
        $this->beConstructedWith('id');
        $this->getId()->shouldBeEqualTo('id');
        $this->shouldHaveType('SIAPI\Component\Search\Result\Image');
    }

    function it_should_return_an_new_image_with_target_name()
    {
        $this->beConstructedWith('id');
        $this->getId()->shouldBeEqualTo('id');

        $this->withTarget('test')->shouldNotBeEqualTo($this);
        $this->withTarget('test')->getTarget()->shouldBeEqualTo('test');
        $this->withTarget('test')->getId()->shouldBeEqualTo('id');

        $this->getTarget()->shouldBeNull();
    }

    function it_should_return_an_new_image_with_mission_name()
    {
        $this->beConstructedWith('id');
        $this->getId()->shouldBeEqualTo('id');

        $this->withMission('test')->shouldNotBeEqualTo($this);
        $this->withMission('test')->getMission()->shouldBeEqualTo('test');
        $this->withMission('test')->getId()->shouldBeEqualTo('id');

        $this->getMission()->shouldBeNull();
    }

    function it_should_return_an_new_image_with_spacecraft_name()
    {
        $this->beConstructedWith('id');
        $this->getId()->shouldBeEqualTo('id');

        $this->withSpacecraft('test')->shouldNotBeEqualTo($this);
        $this->withSpacecraft('test')->getSpacecraft()->shouldBeEqualTo('test');
        $this->withSpacecraft('test')->getId()->shouldBeEqualTo('id');

        $this->getSpacecraft()->shouldBeNull();
    }

    function it_should_return_an_new_image_with_instrument_name()
    {
        $this->beConstructedWith('id');
        $this->getId()->shouldBeEqualTo('id');

        $this->withInstrument('test')->shouldNotBeEqualTo($this);
        $this->withInstrument('test')->getInstrument()->shouldBeEqualTo('test');
        $this->withInstrument('test')->getId()->shouldBeEqualTo('id');

        $this->getInstrument()->shouldBeNull();
    }
}
