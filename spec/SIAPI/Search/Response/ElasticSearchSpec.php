<?php

namespace spec\SIAPI\Search\Response;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ElasticSearchSpec extends ObjectBehavior
{
    function let()
    {
        $json = file_get_contents(realpath('spec/fixtures/elasticsearch-response.json'));
        $this->beConstructedWith(json_decode($json, true));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Search\Response\ElasticSearch');
    }

    function it_should_return_the_total_of_documents()
    {
        $this->getTotal()->shouldBeEqualTo(100);
    }

    function it_should_return_a_result_set()
    {
        $this->getResultSet()->shouldReturnAnInstanceOf('SIAPI\Search\ResultSet');
        $this->getResultSet()->shouldHaveCount(10);
    }
}
