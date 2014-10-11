<?php

namespace spec\SIAPI\Search\Repository;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ElasticSearchSpec extends JsonSerializableBehavior
{
    /**
     * @param \SIAPI\Search\Search $search
     * @param \SIAPI\ElasticSearch\Response $response
     */
    /*function let($search, $response)
    {
        $json = $this->getJsonFixtureContent('elasticsearch/response.json');

        $search->getResponse()->willReturn(json_decode($json, true));
        $this->beConstructedWith($search);
    }*/

    /*function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Search\Repository\ElasticSearch');
    }*/

    /*function it_should_return_a_search_response()
    {
        $this->getAll()->shouldReturnAnInstanceOf('SIAPI\Search\Response');
        $this->getAll()->shouldReturnAnInstanceOf('SIAPI\ElasticSearch\Response');
    }*/
}
