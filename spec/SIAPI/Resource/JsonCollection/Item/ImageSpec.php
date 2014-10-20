<?php

namespace spec\SIAPI\Resource\JsonCollection\Item;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec  extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Resource\JsonCollection\Item\Image');
        $this->shouldBeAnInstanceOf('SIAPI\JsonCollection\Item');
    }

    function it_should_have_the_mission_data()
    {
        $this->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_data()
    {
        $this->getData()->shouldHaveDataWithName('target');
    }

    function it_should_have_the_spacecraft_data()
    {
        $this->getData()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_data()
    {
        $this->getData()->shouldHaveDataWithName('instrument');
    }

    function it_should_have_the_source_data()
    {
        $this->getData()->shouldHaveDataWithName('source');
    }

}
