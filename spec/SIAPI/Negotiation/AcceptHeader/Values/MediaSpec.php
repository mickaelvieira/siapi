<?php

namespace spec\SIAPI\Negotiation\AcceptHeader\Values;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class MediaSpec
 * @package spec\SIAPI\Negotiation\AcceptHeader\Values
 */
class MediaSpec extends ObjectBehavior
{
    /**
     *
     */
    // text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
    function it_is_initializable()
    {
        $this->beConstructedWith(null);
        $this->shouldHaveType('SIAPI\Negotiation\AcceptHeader\Values\Media');
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

    function it_should_be_aware_of_having_the_accept_all_tag()
    {
        $this->beConstructedWith('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8');
        $this->shouldHaveAcceptAllTag();
    }

    function it_should_be_aware_of_having_the_accept_all_tag_for_a_specific_type()
    {
        $this->beConstructedWith('text/html,image/*,application/xml;q=0.9,*/*;q=0.8');
        $this->shouldHaveAcceptAllSubTag('image');
    }

    function it_should_be_aware_of_having_a_value_range()
    {
        $this->beConstructedWith('audio/webm, audio/ogg, audio/wav, audio/*;q=0.9, application/ogg;q=0.7, video/*;q=0.6; */*;q=0.5');
        $this->shouldHaveValue('audio/ogg');
        $this->shouldNotHaveValue('text/html');
    }

    function it_should_sort_the_entities()
    {
        $this->beConstructedWith('text/*,text/html,text/html;level=1,*/*');
        $this->__toString()->shouldBeEqualTo('text/html;level=1;q=1,text/html;q=1,text/*;q=1,*/*;q=1');
    }
}
