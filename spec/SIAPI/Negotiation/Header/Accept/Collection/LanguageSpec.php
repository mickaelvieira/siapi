<?php

namespace spec\SIAPI\Negotiation\Header\Accept\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LanguageSpec
 * @package spec\SIAPI\Negotiation\Header\Accept\Collection
 */
class LanguageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(null);
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Collection\Language');
    }

    function it_should_return_the_accept_all_tag_when_the_header_string_is_null()
    {
        $this->beConstructedWith(null);
        $this->__toString()->shouldBeEqualTo('*;q=1');
    }

    function it_should_return_the_accept_all_tag_when_the_header_string_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('*;q=1');
    }

    function it_should_be_aware_of_having_the_accept_all_tag()
    {
        $this->beConstructedWith('da, en-gb;q=0.8, *, en;q=0.7');
        $this->shouldHaveAcceptAll();
    }

    function it_should_be_aware_of_having_the_accept_all_sub_tag_for_a_specific_tag()
    {
        $this->beConstructedWith('da, en-gb;q=0.8, *, en;q=0.7');
        $this->shouldHaveAcceptAllSubTag('da');
    }

    function it_should_sort_the_entities()
    {
        $this->beConstructedWith('es-ES;q=0.7, es; q=0.6 ,fr; q=1.0, en; q=0.5,da , fr-BE');
        $this->__toString()->shouldBeEqualTo('fr;q=1,da;q=1,fr-BE;q=1,es-ES;q=0.7,es;q=0.6,en;q=0.5');
    }

    function it_should_sort_the_entities_with_accept_all_tag()
    {
        $this->beConstructedWith('es-ES;q=0.7, es; q=0.6 ,fr; q=1.0, *;q=0.3, fr-CH');
        $this->__toString()->shouldBeEqualTo('fr;q=1,fr-CH;q=1,es-ES;q=0.7,es;q=0.6,*;q=0.3');
    }

    function it_should_be_aware_of_having_a_value_range()
    {
        $this->beConstructedWith('es-ES;q=0.7, es; q=0.6 ,fr; q=1.0, *;q=0.3, fr-CH');
        $this->shouldHaveValueRange('fr-CH');
        $this->shouldNotHaveValueRange('en');
    }
}
