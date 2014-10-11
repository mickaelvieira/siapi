<?php

namespace spec\SIAPI\Search\Repository;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ElasticSearchSpec extends JsonSerializableBehavior
{
    /**
     * @param \SIAPI\ElasticSearch\Search $search
     */
    function let($search)
    {
        $json = $this->getJsonFixtureContent('elasticsearch/response.json');

        $search->getResults()->willReturn(json_decode($json, true));
        $this->beConstructedWith($search);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Search\Repository\ElasticSearch');
    }

    function it_should_return_a_search_response()
    {
        $this->getAll()->shouldReturnAnInstanceOf('SIAPI\Search\Response');
        $this->getAll()->shouldReturnAnInstanceOf('SIAPI\Search\Response\ElasticSearch');
    }
}
