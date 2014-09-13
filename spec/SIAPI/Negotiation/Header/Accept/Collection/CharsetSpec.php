<?php

namespace spec\SIAPI\Negotiation\Header\Accept\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CharsetSpec
 * @package spec\SIAPI\Negotiation\Header\Accept\Collection
 */
class CharsetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Collection\Charset');
    }

    function it_should_return_the_default_charset_when_the_header_string_is_null()
    {
        $this->beConstructedWith(null);
        $this->__toString()->shouldBeEqualTo('ISO-8859-1;q=1');
    }

    function it_should_return_the_default_charset_when_the_header_string_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('ISO-8859-1;q=1');
    }

    function it_should_be_aware_of_having_a_specific_charset()
    {
        $this->beConstructedWith('iso-8859-5, *, unicode-1-1;q=0.8');
        $this->shouldHaveCharset('unicode-1-1');
    }

    function it_should_be_aware_of_having_the_accept_all_tag()
    {
        $this->beConstructedWith('iso-8859-5, *, unicode-1-1;q=0.8');
        $this->shouldHaveAcceptAll();
    }
}
