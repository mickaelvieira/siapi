<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CharsetSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class CharsetSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Collection\Charset $collection
     * @param \SIAPI\Negotiation\Strategy\Charset $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable($collection, $strategy)
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Charset');
    }

    function it_should_return_the_charset_when_it_matches_a_supported_format($collection, $strategy)
    {
        $collection->hasValueRange('iso-8859-5')->willReturn(false);
        $collection->hasValueRange('iso-8859-1')->willReturn(false);
        $collection->hasValueRange('unicode-1-1')->willReturn(true);
        $collection->hasAcceptAll()->willReturn(true);

        $this->guess(['iso-8859-5', 'iso-8859-1', 'unicode-1-1'])->shouldReturn('unicode-1-1');
    }

    function it_should_return_null_when_it_does_not_match_any_and_the_accept_tag_is_not_present(
        $collection,
        $strategy
    )
    {
        $collection->hasValueRange('iso-8859-5')->willReturn(false);
        $collection->hasValueRange('iso-8859-1')->willReturn(false);
        $collection->hasValueRange('unicode-1-1')->willReturn(false);
        $collection->hasAcceptAll()->willReturn(false);

        $this->guess(['iso-8859-5', 'iso-8859-1', 'unicode-1-1'])->shouldReturn(null);
    }

    function it_should_return_the_1st_supported_format_when_it_matches_several($collection, $strategy)
    {
        $collection->hasValueRange('iso-8859-5')->willReturn(true);
        $collection->hasValueRange('iso-8859-1')->willReturn(true);
        $collection->hasValueRange('unicode-1-1')->willReturn(true);
        $collection->hasAcceptAll()->willReturn(false);

        $this->guess(['iso-8859-5', 'iso-8859-1', 'unicode-1-1'])->shouldReturn('iso-8859-5');
    }

    function it_should_return_the_1st_supported_when_it_does_not_match_any_but_the_accept_tag_is_present(
        $collection,
        $strategy
    )
    {
        $collection->hasValueRange('utf-8')->willReturn(false);
        $collection->hasValueRange('utf-7')->willReturn(false);
        $collection->hasValueRange('utf-16')->willReturn(false);
        $collection->hasAcceptAll()->willReturn(true);

        $this->guess(['utf-8', 'utf-7', 'utf-16'])->shouldReturn('utf-8');
    }
}
