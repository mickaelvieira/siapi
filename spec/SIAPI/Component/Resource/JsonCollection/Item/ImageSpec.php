<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Item;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ImageSpec  extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Item\Image');
        $this->shouldBeAnInstanceOf('JsonCollection\Item');
    }

    function it_should_have_the_mission_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('target');
    }

    function it_should_have_the_spacecraft_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('instrument');
    }

    function it_should_have_the_source_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('source');
    }

}
