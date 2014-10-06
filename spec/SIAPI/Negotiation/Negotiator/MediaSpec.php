<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Prophecy\Prophet;
/**
 * Class MediaSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class MediaSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\AcceptHeader\Values\Media $collection
     * @param \SIAPI\Negotiation\Strategy\Media $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Media');
    }

    function it_should_return_the_media_type_when_it_matches_a_supported_media_type($collection)
    {
        $collection->findFirstMatchingValue(['text/html'])->willReturn('text/html');
        $this->negotiate(['text/html'])->shouldReturn('text/html');
    }

    function it_should_return_the_media_type_when_all_subtypes_are_accepted($collection)
    {
        $collection->findFirstMatchingValue(['text/csv'])->willReturn(null);
        $collection->findFirstMatchingSubValue(['text/csv'])->willReturn('text/csv');

        $this->negotiate(['text/csv'])->shouldReturn('text/csv');
    }

    function it_should_respect_client_preference($collection)
    {
        $collection->findFirstMatchingValue(['application/xml', 'text/html'])->willReturn('text/html');
        $this->negotiate(['application/xml', 'text/html'])->shouldReturn('text/html');
    }

    function it_should_return_the_1st_supported_when_there_is_no_match_and_the_accept_all_tag_is_present($collection)
    {
        $supported = ['application/xml', 'text/html'];

        $collection->findFirstMatchingValue($supported)->willReturn(null);
        $collection->findFirstMatchingSubValue($supported)->willReturn(null);
        $collection->hasAcceptAllTag()->willReturn(true);

        $this->negotiate($supported)->shouldReturn('application/xml');
    }
}
