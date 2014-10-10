<?php

namespace spec\SIAPI\JsonCollection\Factory\Template\Object;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\JsonCollection\Factory\Template\Object\Image');
    }

    function it_should_return_a_json_collection_template()
    {
        $this->getTemplate()->shouldBeAnInstanceOf('SIAPI\JsonCollection\Template');
    }

    function it_should_add_the_mission_data_to_the_object_template()
    {
        $this->getTemplate()->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_add_the_target_data_to_the_object_template()
    {
        $this->getTemplate()->getData()->shouldHaveDataWithName('target');
    }

    function it_should_add_the_satelliteof_data_to_the_object_template()
    {
        $this->getTemplate()->getData()->shouldHaveDataWithName('satelliteof');
    }

    function it_should_add_the_spacecraft_data_to_the_object_template()
    {
        $this->getTemplate()->getData()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_add_the_instrument_data_to_the_object_template()
    {
        $this->getTemplate()->getData()->shouldHaveDataWithName('instrument');
    }

    function it_should_add_the_extra_data_to_the_object_template()
    {
        $this->getTemplate()->getData()->shouldHaveDataWithName('extra');
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
            . '{"name":"extra","value":""}'
            . ']}';

        $this->getTemplate()->jsonSerialize()->shouldBeEqualToJson($json);
    }
}
