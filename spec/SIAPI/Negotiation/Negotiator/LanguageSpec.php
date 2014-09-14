<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LanguageSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class LanguageSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Collection\Language $collection
     * @param \SIAPI\Negotiation\Strategy\Language $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable($collection, $strategy)
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Language');
    }

    function it_should_return_the_language_when_it_matches_a_supported_language($collection, $strategy)
    {
        $collection->hasValueRange('en')->willReturn(false);
        $collection->hasValueRange('fr')->willReturn(true);

        $this->guess(['en', 'fr'])->shouldReturn('fr');
    }

    function it_should_return_the_generic_language($collection, $strategy)
    {
        $collection->hasValueRange('en-US')->willReturn(false);
        $collection->hasTag('en')->willReturn(false);

        $this->guess(['en-US'])->shouldReturn('en');
    }
}
