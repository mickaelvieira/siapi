<?php

namespace spec\SIAPI\Negotiation\Header\Accept\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LanguageSpec
 * @package spec\SIAPI\Negotiation\Header\Accept\Entity
 */
class LanguageSpec extends ObjectBehavior
{
    /**
     * *
     * da
     * en-gb;q=0.8
     * en;q=0.7
     */

    function it_is_initializable()
    {
        $this->beConstructedWith('');
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Entity\Language');
    }

    function it_should_return_an_empty_string_when_input_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('');
    }

    function it_should_return_the_language_range_when_it_is_present_in_the_header_string()
    {
        $this->beConstructedWith('da');
        $this->getValueRange()->shouldBeEqualTo('da');
    }

    function it_should_have_the_quality_equal_to_one_when_it_is_not_present_in_the_header_string()
    {
        $this->beConstructedWith('en-gb');
        $this->getQuality()->shouldBeEqualTo(1.0);
    }

    function it_should_return_the_quality_when_it_is_present_in_the_header_string()
    {
        $this->beConstructedWith('en-gb;q=0.4');
        $this->getQuality()->shouldBeEqualTo(0.4);
    }

    function it_should_be_aware_of_having_the_match_all_tag_when_it_is_present_in_the_header_string()
    {
        $this->beConstructedWith('*;q=0.3');
        $this->shouldHaveAcceptAll();
    }

    function it_should_have_the_quality_equal_to_one_it_has_the_match_all_tag()
    {
        $this->beConstructedWith('*;q=0.3');
        $this->getQuality()->shouldBeEqualTo(1.0);
    }
}
