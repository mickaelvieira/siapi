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
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Collection\Language');
    }

    function it_should_return_the_accept_all_tag_when_the_header_string_is_null()
    {
        $this->beConstructedWith(null);
        $this->__toString()->shouldBeEqualTo('*');
    }

    function it_should_return_the_accept_all_tag_when_the_header_string_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('*');
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
}
