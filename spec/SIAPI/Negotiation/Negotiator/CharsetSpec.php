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

    function it_should_return_the_charset_when_it_matches_a_supported_charset($collection, $strategy)
    {
        $collection->hasValue('iso-8859-5')->willReturn(false);
        $collection->hasValue('iso-8859-1')->willReturn(false);
        $collection->hasValue('unicode-1-1')->willReturn(true);
        $collection->hasAcceptAllTag()->willReturn(true);

        $this->negotiate(['iso-8859-5', 'iso-8859-1', 'unicode-1-1'])->shouldReturn('unicode-1-1');
    }

    function it_should_return_null_when_it_does_not_match_any_and_the_accept_tag_is_not_present($collection, $strategy)
    {
        $collection->hasValue('iso-8859-5')->willReturn(false);
        $collection->hasValue('iso-8859-1')->willReturn(false);
        $collection->hasValue('unicode-1-1')->willReturn(false);
        $collection->hasAcceptAllTag()->willReturn(false);

        $this->negotiate(['iso-8859-5', 'iso-8859-1', 'unicode-1-1'])->shouldReturn(null);
    }

    function it_should_return_the_1st_supported_charset_when_it_matches_several($collection, $strategy)
    {
        $collection->hasValue('iso-8859-5')->willReturn(true);
        $collection->hasValue('iso-8859-1')->willReturn(true);
        $collection->hasValue('unicode-1-1')->willReturn(true);
        $collection->hasAcceptAllTag()->willReturn(false);

        $this->negotiate(['iso-8859-5', 'iso-8859-1', 'unicode-1-1'])->shouldReturn('iso-8859-5');
    }

    function it_should_return_the_1st_supported_when_it_does_not_match_any_but_the_accept_tag_is_present($collection, $strategy)
    {
        $collection->hasValue('utf-8')->willReturn(false);
        $collection->hasValue('utf-7')->willReturn(false);
        $collection->hasValue('utf-16')->willReturn(false);
        $collection->hasAcceptAllTag()->willReturn(true);

        $this->negotiate(['utf-8', 'utf-7', 'utf-16'])->shouldReturn('utf-8');
    }
}
