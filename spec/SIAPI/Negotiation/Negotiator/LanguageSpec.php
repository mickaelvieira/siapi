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
     * @param \SIAPI\Negotiation\Header\Accept\Values\Language $collection
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

        $collection->hasValue('en-US')->willReturn(false);
        $collection->hasValue('en-GB')->willReturn(false);
        $collection->hasValue('fr-BE')->willReturn(true);

        $collection->hasTag('da')->willReturn(true);
        $collection->hasAcceptAllSubTag('da')->willReturn(true);

        $collection->hasTag('fr')->willReturn(true);
        $collection->hasAcceptAllSubTag('fr')->willReturn(true);

        $collection->hasTag('en')->willReturn(true);
        $collection->hasAcceptAllSubTag('en')->willReturn(true);

        $this->negotiate(['en-US', 'fr-BE'])->shouldReturn('en-US');
        $this->negotiate(['fr-BE', 'en-GB'])->shouldReturn('fr-BE');
    }

    function it_should_return_the_1st_supported_when_it_does_not_match_any_but_the_accept_all_tag_is_present($collection, $strategy)
    {
        // *

        $collection->hasValue('fr')->willReturn(false);
        $collection->hasValue('en')->willReturn(false);
        $collection->hasValue('de')->willReturn(false);
        $collection->hasAcceptAllTag()->willReturn(true);

        $this->negotiate(['fr', 'en', 'de'])->shouldReturn('fr');
    }
}
