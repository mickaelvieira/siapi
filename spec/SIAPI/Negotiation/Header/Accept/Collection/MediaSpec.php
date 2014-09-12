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
        $header = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';

        $this->beConstructedWith($header);
        $this->__toString()->shouldBeEqualTo(
            'text/html;q=1,application/xhtml+xml;q=1,application/xml;q=0.9,*/*;q=0.8'
        );
    }

    function it_should_be_aware_when_all_media_type_are_accepted()
    {
        $header = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
        $this->beConstructedWith($header);
        $this->shouldHaveAcceptAll();
    }
}
