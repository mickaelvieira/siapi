<?php

namespace spec\SIAPI\Negotiation\Header\Accept\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class MediaSpec
 * @package spec\SIAPI\Negotiation\Header\Accept\Collection
 */
class MediaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Collection\Media');
    }

    function it_should_return_the_accept_all_tag_when_the_header_string_is_null()
    {
        $this->beConstructedWith(null);
        $this->__toString()->shouldBeEqualTo('*/*;q=1');
    }

    function it_should_return_the_accept_all_tag_when_the_header_string_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('*/*;q=1');
    }

    function it_should_return_the_header_string_representation()
    {
        $this->beConstructedWith('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');
        $this->__toString()->shouldBeEqualTo(
            'text/html;q=1,application/xhtml+xml;q=1,application/xml;q=0.9,*/*;q=0.8'
        );
    }

    function it_should_be_aware_of_having_the_accept_all_tag()
    {
        $this->beConstructedWith('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');
        $this->shouldHaveAcceptAll();
    }

    function it_should_be_aware_of_having_the_accept_all_tag_for_a_specific_type()
    {
        $this->beConstructedWith('text/html,image/*,application/xml;q=0.9,*/*;q=0.8');
        $this->shouldHaveAcceptAllSubTypes('image');
    }
}
