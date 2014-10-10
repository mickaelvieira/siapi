<?php

namespace spec\SIAPI\JsonCollection\Factory\Template\Query;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\JsonCollection\Factory\Template\Query\Image');
    }

    function it_should_return_a_json_collection_query()
    {
        $this->getQuery()->shouldBeAnInstanceOf('SIAPI\JsonCollection\Query');
        $this->getQuery()->getName()->shouldBeEqualTo('image');
        $this->getQuery()->getHref()->shouldBeEqualTo('search');
        $this->getQuery()->getPrompt()->shouldBeEqualTo('Here my prompt Message');
    }

    function it_should_add_the_mission_parameter_to_the_query_template()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_add_the_target_parameter_to_the_query_template()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('target');
    }

    function it_should_add_the_satelliteof_parameter_to_the_query_template()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('satelliteof');
    }

    function it_should_add_the_spacecraft_parameter_to_the_query_template()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('spacecraft');
    }

    function it_should_add_the_instrument_parameter_to_the_query_template()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('instrument');
    }

    function it_should_add_the_extra_parameter_to_the_query_template()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('extra');
    }

    function it_should_have_the_correct_json_representation()
    {
        $this->getQuery()->jsonSerialize()->shouldBeEqualToJson('{"href":"search","rel":"search","name":"image","prompt":"Here my prompt Message","data":[{"name":"mission","value":""},{"name":"target","value":""},{"name":"satelliteof","value":""},{"name":"spacecraft","value":""},{"name":"instrument","value":""},{"name":"extra","value":""}]}');
    }
}