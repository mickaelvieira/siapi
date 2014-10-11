<?php

namespace spec\SIAPI\ElasticSearch\Query;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\ElasticSearch\Query\Image');
    }

    function it_should_return_a_elastic_search_object()
    {
        $this->getQuery()->shouldReturnAnInstanceOf('\Elastica\Query');
    }

    function it_should_return_prepare_the_query()
    {
        $json = $this->getJsonFixtureContent('elasticsearch/global.json');
        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }
}
