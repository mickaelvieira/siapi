<?php

namespace spec\SIAPI\Component\ElasticSearch;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class ResponseSpec extends JsonSerializableBehavior
{
    /**
     * @param \Elastica\ResultSet $resultSet
     * @param \Elastica\Result $result
     */
    function let($resultSet, $result)
    {
        $jsonResponse = $this->getJsonFixtureContent('elasticsearch/response.json');
        $jsonSource   = $this->getJsonFixtureContent('elasticsearch/source.json');

        $result->getId()->willReturn(99);
        $result->getSource()->willReturn(json_decode($jsonSource, true));

        $resultSet->getResults()->willReturn(array($result));
        $resultSet->getTotalHits()->willReturn(100);
        $resultSet->getAggregations()->willReturn(array());

        $this->beConstructedWith($resultSet);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\\ElasticSearch\Response');
    }

    function it_should_return_the_total_of_documents()
    {
        $this->getTotal()->shouldBeEqualTo(100);
    }

    function it_should_return_a_result_set()
    {
        $this->getResultSet()->shouldReturnAnInstanceOf('SIAPI\Component\Search\ResultSet');
        $this->getResultSet()->shouldHaveCount(1);
    }
}
