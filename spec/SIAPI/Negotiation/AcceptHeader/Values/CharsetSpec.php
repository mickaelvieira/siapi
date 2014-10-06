<?php

namespace spec\SIAPI\Negotiation\AcceptHeader\Values;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CharsetSpec
 * @package spec\SIAPI\Negotiation\AcceptHeader\Values
 */
class CharsetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(null);
        $this->shouldHaveType('SIAPI\Negotiation\AcceptHeader\Values\Charset');
    }

    function it_should_return_the_default_charset_when_the_header_string_is_null()
    {
        $this->beConstructedWith(null);
        $this->__toString()->shouldBeEqualTo('*;q=1');
    }

    function it_should_return_the_default_charset_when_the_header_string_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('*;q=1');
    }

    function it_should_be_aware_of_having_a_specific_charset()
    {
        $this->beConstructedWith('iso-8859-5, *, unicode-1-1;q=0.8');
        $this->shouldHaveTag('unicode-1-1');
    }

    function it_should_add_iso_8859_1_when_it_is_not_present_in_the_header_string()
    {
        $this->beConstructedWith('iso-8859-5, unicode-1-1;q=0.8');
        $this->__toString()->shouldBeEqualTo('iso-8859-5;q=1,iso-8859-1;q=1,unicode-1-1;q=0.8');
    }

    function it_should_not_add_iso_8859_1_when_it_is_not_present_but_the_accept_all_tag_is_present_in_the_header_string()
    {
        $this->beConstructedWith('iso-8859-5, *;q=0.4, unicode-1-1;q=0.8');
        $this->__toString()->shouldBeEqualTo('iso-8859-5;q=1,unicode-1-1;q=0.8,*;q=0.4');
    }

    function it_should_be_aware_of_having_the_accept_all_tag()
    {
        $this->beConstructedWith('iso-8859-5, *, unicode-1-1;q=0.8');
        $this->shouldHaveAcceptAllTag();
    }

    function it_should_be_aware_of_having_a_value_range()
    {
        $this->beConstructedWith('iso-8859-5;q=1,iso-8859-1;q=1,unicode-1-1;q=0.8');
        $this->shouldHaveValue('unicode-1-1');
        $this->shouldNotHaveValue('utf-8');
    }

    function it_should_sort_the_entities()
    {
        $this->beConstructedWith('utf-7;q=0.5, iso-8859-5, unicode-1-1;q=0.8');
        $this->__toString()->shouldBeEqualTo('iso-8859-5;q=1,iso-8859-1;q=1,unicode-1-1;q=0.8,utf-7;q=0.5');
    }

    function it_should_sort_the_entities_with_accept_all_tag()
    {
        $this->beConstructedWith('utf-8, utf-7, *;q=0.3, iso-8859-1, unicode-1-1;q=0.8');
        $this->__toString()->shouldBeEqualTo('utf-8;q=1,utf-7;q=1,iso-8859-1;q=1,unicode-1-1;q=0.8,*;q=0.3');
    }

    function it_should_return_the_first_matching_value()
    {
        $this->beConstructedWith('utf-8, utf-7, *;q=0.3, iso-8859-1, unicode-1-1;q=0.8');
        $this->findFirstMatchingValue(['utf-8', 'utf-7'])->shouldBeEqualTo('utf-8');
    }

    function it_should_return_null_where_there_is_no_matching_value()
    {
        $this->beConstructedWith('utf-8, utf-7, *;q=0.3, unicode-1-1;q=0.8');
        $this->findFirstMatchingValue(['iso-8859-1'])->shouldBeNull();
    }

    function it_should_return_always_return_null_when_search_a_sub_value()
    {
        $this->beConstructedWith('utf-8, utf-7, *;q=0.3, iso-8859-1, unicode-1-1;q=0.8');
        $this->findFirstMatchingSubValue(['utf-8'])->shouldBeNull();
    }
}
