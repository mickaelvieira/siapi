<?php

namespace spec\SIAPI\ElasticSearch\Search;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ImageSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\ElasticSearch\Search\Image');
    }

    function it_should_return_a_elastic_search_object()
    {
        $this->getQuery()->shouldReturnAnInstanceOf('\Elastica\Query');
    }

    function it_should_return_prepare_the_query()
    {
        $json = '{'
                . '"aggs":{"mission":{"terms":{"field":"mission","size":0}}},'
                . '"query":{"match_all":{}}'
                . '}';

        $this->jsonSerialize()->shouldBeEqualToJson($json);
    }
}
