<?php

namespace spec\SIAPI\JsonCollection\Template;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\JsonCollection\Template\Image');
        $this->shouldImplement('SIAPI\JsonCollection\DataContainer');
        $this->shouldBeAnInstanceOf('SIAPI\JsonCollection\Template');
    }

    function it_should_have_the_mission_data()
    {
        $this->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_have_the_target_data()
    {
        $this->getData()->shouldHaveDataWithName('target');
    }

    function it_should_have_the_satelliteof_data()
    {
        $this->getData()->shouldHaveDataWithName('satelliteof');
    }

    function it_should_have_the_spacecraft_data()
    {
        $this->getData()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_have_the_instrument_data()
    {
        $this->getData()->shouldHaveDataWithName('instrument');
    }

    function it_should_have_the_extra_data()
    {
        $this->getData()->shouldHaveDataWithName('extra');
    }
    function it_should_have_the_source_data()
    {
        $this->getData()->shouldHaveDataWithName('source');
    }

    function it_should_have_the_correct_json_representation()
    {
        $json = '{'
            . '"data":['
            . '{"name":"mission","value":""},'
            . '{"name":"target","value":""},'
            . '{"name":"satelliteof","value":""},'
            . '{"name":"spacecraft","value":""},'
            . '{"name":"instrument","value":""},'
            . '{"name":"extra","value":""},'
            . '{"name":"source","value":""}'
            . ']}';

        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }
}