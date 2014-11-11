<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Query;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Query\Image');
        $this->shouldImplement('JsonCollection\DataAware');
        $this->shouldBeAnInstanceOf('JsonCollection\Query');
    }

    function it_should_have_the_image_properties()
    {
        $this->getName()->shouldBeEqualTo('image');
        $this->getHref()->shouldBeEqualTo('search');
        $this->getPrompt()->shouldBeEqualTo('Search');
    }

    function it_should_have_the_mission_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('target');
    }

    /*function it_should_have_the_satelliteof_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('satelliteof');
    }*/

    function it_should_have_the_spacecraft_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('instrument');
    }

    /*function it_should_have_the_extra_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('extra');
    }*/

    function it_should_have_the_source_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('source');
    }

    function it_should_have_the_size_parameter()
    {
        $this->getDataSet()->shouldHaveDataWithName('size');
    }

    /*function it_should_have_the_correct_json_representation()
    {
        $json = $this->getJsonFixtureContent('jsoncollection/query.json');
        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }*/
}
