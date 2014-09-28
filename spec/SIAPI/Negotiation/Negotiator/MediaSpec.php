<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class MediaSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class MediaSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Values\Media $collection
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

    function it_should_return_the_media_type_when_it_matches_a_supported_media_type($collection, $strategy)
    {
        // text/*;q=0.3, text/html;q=0.7, */*;q=0.5

        $collection->hasTag('text')->willReturn(true);
        $collection->hasSubTag('html')->willReturn(true);
        $collection->hasAcceptAllSubTag('text')->willReturn(true);
        $collection->hasValue('text/html')->willReturn(true);
        $collection->hasAcceptAllTag()->willReturn(true);

        $this->negotiate(['text/html'])->shouldReturn('text/html');
    }


    function it_should_return_the_media_type_when_all_subtypes_are_accepted($collection, $strategy)
    {
        // text/*;q=0.3, text/html;q=0.7, */*;q=0.5

        $collection->hasTag('text')->willReturn(true);
        $collection->hasSubTag('html')->willReturn(true);
        $collection->hasAcceptAllSubTag('text')->willReturn(true);
        $collection->hasValue('text/html')->willReturn(true);
        $collection->hasValue('text/csv')->willReturn(false);
        $collection->hasAcceptAllTag()->willReturn(true);

        $this->negotiate(['text/csv'])->shouldReturn('text/csv');
    }

    function it_should_respect_client_preference($collection, $strategy)
    {

        // "text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"

        $collection->hasValue('text/html')->willReturn(true);
        $collection->hasValue('application/xhtml+xml')->willReturn(true);
        $collection->hasValue('application/xml')->willReturn(true);

        $collection->hasAcceptAllTag()->willReturn(true);



        /*$collection->hasTag('text')->willReturn(true);
        $collection->hasSubTag('html')->willReturn(true);
        $collection->hasAcceptAllSubTag('text')->willReturn(true);
        $collection->hasValue('text/csv')->willReturn(false);*/

        $this->negotiate(['application/xml', 'text/html'])->shouldReturn('text/html');

    }

}
