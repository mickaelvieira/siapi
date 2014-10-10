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

    function it_should_have_the_correct_json_representation()
    {
        $this->getQuery()->jsonSerialize()->shouldBeEqualToJson('{"href":"search","rel":"search","name":"image","prompt":"Here my prompt Message","data":[{"name":"mission","value":""},{"name":"target","value":""}]}');
    }

    function it_should_nave_data_with_the_name_mission()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('mission');
    }

    function it_should_nave_data_with_the_name_target()
    {
        $this->getQuery()->getData()->shouldHaveDataWithName('target');
    }
}
