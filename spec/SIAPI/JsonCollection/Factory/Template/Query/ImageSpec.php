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
        $this->getQuery()->getData()->shouldHaveCount(2);

        $this->getQuery()->jsonSerialize()->shouldBeEqualToJson('{"value":"my value"');
    }
}
