<?php

namespace spec\SIAPI\Search\Repository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElasticSearchSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\ElasticSearch\Search $search
     */
    function let($search)
    {
        $json = file_get_contents(realpath('spec/fixtures/elasticsearch-response.json'));
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
