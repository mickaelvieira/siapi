<?php

namespace spec\SIAPI\Component\ElasticSearch\Query;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\ElasticSearch\Query\Image');
    }

    function it_should_return_a_elastic_search_object()
    {
        $this->getQuery()->shouldReturnAnInstanceOf('\Elastica\Query');
    }

    /**
     * disabled
     */
    function xit_should_return_prepare_the_query()
    {
        $json = $this->getJsonFixtureContent('elasticsearch/global.json');
        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }
}
