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
        $collection->hasValue('en')->willReturn(false);
        $collection->hasValue('fr')->willReturn(true);

        $this->negotiate(['en', 'fr'])->shouldReturn('fr');
    }

    function it_should_return_the_generic_language($collection, $strategy)
    {
        // fr;q=1,da;q=1,fr-BE;q=1,es-ES;q=0.7,es;q=0.6,en;q=0.5
        /**
         * @TODO testing conditions should reflect user's preferences
         */
        $collection->hasValue('en-US')->willReturn(false);
        $collection->hasTag('en')->willReturn(false);

        $this->negotiate(['en-US'])->shouldReturn('en');
    }
}
