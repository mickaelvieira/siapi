<?php

namespace spec\SIAPI\JsonCollection\Query;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\JsonCollection\Query\Image');
        $this->shouldImplement('SIAPI\JsonCollection\DataContainer');
        $this->shouldBeAnInstanceOf('SIAPI\JsonCollection\Query');
    }

    function it_should_have_the_image_properties()
    {
        $this->getName()->shouldBeEqualTo('image');
        $this->getHref()->shouldBeEqualTo('search');
        $this->getPrompt()->shouldBeEqualTo('Here my prompt Message');
    }

    function it_should_have_the_mission_parameter()
    {
        $this->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_parameter()
    {
        $this->getData()->shouldHaveDataWithName('target');
    }

    /*function it_should_have_the_satelliteof_parameter()
    {
        $this->getData()->shouldHaveDataWithName('satelliteof');
    }*/

    function it_should_have_the_spacecraft_parameter()
    {
        $this->getData()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_parameter()
    {
        $this->getData()->shouldHaveDataWithName('instrument');
    }

    /*function it_should_have_the_extra_parameter()
    {
        $this->getData()->shouldHaveDataWithName('extra');
    }*/

    function it_should_have_the_source_parameter()
    {
        $this->getData()->shouldHaveDataWithName('source');
    }

    function it_should_have_the_correct_json_representation()
    {
        $json = $this->getJsonFixtureContent('jsoncollection/query.json');
        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }
}
