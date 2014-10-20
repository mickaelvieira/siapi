<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Template;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Template\Image');
        $this->shouldImplement('SIAPI\Component\JsonCollection\DataContainer');
        $this->shouldBeAnInstanceOf('SIAPI\Component\JsonCollection\Template');
    }

    function it_should_have_the_mission_data()
    {
        $this->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_data()
    {
        $this->getData()->shouldHaveDataWithName('target');
    }

    /*function it_should_have_the_satelliteof_data()
    {
        $this->getData()->shouldHaveDataWithName('satelliteof');
    }*/

    function it_should_have_the_spacecraft_data()
    {
        $this->getData()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_data()
    {
        $this->getData()->shouldHaveDataWithName('instrument');
    }

    /*function it_should_have_the_extra_data()
    {
        $this->getData()->shouldHaveDataWithName('extra');
    }*/
    function it_should_have_the_source_data()
    {
        $this->getData()->shouldHaveDataWithName('source');
    }

    function it_should_have_the_size_data()
    {
        $this->getData()->shouldHaveDataWithName('size');
    }
    /*function it_should_have_the_correct_json_representation()
    {
        $json = $this->getJsonFixtureContent('jsoncollection/template.json');
        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }*/
}
