<?php

namespace spec\SIAPI\Component\Search\Repository;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ElasticSearchSpec extends JsonSerializableBehavior
{
    /**
     * @param \SIAPI\Component\Search\Search $search
     * @param \SIAPI\Component\ElasticSearch\Response $response
     */
    /*function let($search, $response)
    {
        $json = $this->getJsonFixtureContent('elasticsearch/response.json');

        $search->getResponse()->willReturn(json_decode($json, true));
        $this->beConstructedWith($search);
    }*/

    /*function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Search\Repository\ElasticSearch');
    }*/

    /*function it_should_return_a_search_response()
    {
        $this->getAll()->shouldReturnAnInstanceOf('SIAPI\Component\Search\Response');
        $this->getAll()->shouldReturnAnInstanceOf('SIAPI\Component\ElasticSearch\Response');
    }*/
}
