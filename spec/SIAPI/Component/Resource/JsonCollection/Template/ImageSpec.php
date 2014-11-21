<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Template;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Template\Image');
        $this->shouldImplement('CollectionJson\DataAware');
        $this->shouldBeAnInstanceOf('CollectionNextJson\Entity\Template');
    }

    function it_should_have_the_mission_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('target');
    }

    /*function it_should_have_the_satelliteof_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('satelliteof');
    }*/

    function it_should_have_the_spacecraft_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('instrument');
    }

    /*function it_should_have_the_extra_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('extra');
    }*/
    function it_should_have_the_source_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('source');
    }

    function it_should_have_the_size_data()
    {
        $this->getDataSet()->shouldHaveDataWithName('size');
    }
    /*function it_should_have_the_correct_json_representation()
    {
        $json = $this->getJsonFixtureContent('jsoncollection/template.json');
        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }*/
}
