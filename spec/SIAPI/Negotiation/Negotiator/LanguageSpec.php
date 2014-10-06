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
     * @param \SIAPI\Negotiation\AcceptHeader\Values\Language $collection
     * @param \SIAPI\Negotiation\Strategy\Language $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable($collection)
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Language');
    }

    function it_should_return_the_language_when_it_matches_a_supported_language($collection)
    {
        $supported = ['en', 'fr'];
        $collection->findFirstMatchingValue($supported)->willReturn('fr');

        $this->negotiate($supported)->shouldReturn('fr');
    }

    function it_should_return_the_generic_language($collection)
    {
        $supported = ['en-US', 'fr-BE'];

        $collection->findFirstMatchingValue($supported)->willReturn(null);
        $collection->findFirstMatchingSubValue($supported)->willReturn('en-US');
        $this->negotiate(['en-US', 'fr-BE'])->shouldReturn('en-US');
    }
}
