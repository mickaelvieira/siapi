<?php

namespace spec\SIAPI\ElasticSearch;

use SIAPI\PhpSpec\JsonSerializableBehavior;

class ResponseSpec extends JsonSerializableBehavior
{
    function let()
    {
        $json = $this->getJsonFixtureContent('elasticsearch/response.json');
        $this->beConstructedWith(json_decode($json, true));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\\ElasticSearch\Response');
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
