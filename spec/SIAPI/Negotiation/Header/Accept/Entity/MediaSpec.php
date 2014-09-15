<?php

namespace spec\SIAPI\Negotiation\Header\Accept\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class MediaSpec
 * @package spec\SIAPI\Negotiation\Header\Accept\Entity
 */
class MediaSpec extends ObjectBehavior
{
    /**
     * *//*
     * *//*;q=0.7
     * text/plain; q=0.5
     * text/html
     * text/x-dvi; q=0.8
     * text/x-c
     */

    function it_is_initializable()
    {
        $this->beConstructedWith("test");
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Entity\Media');
    }

    function it_should_return_an_empty_string_when_input_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('');
    }

    function it_should_return_the_media_range_when_it_is_present_in_the_header_string()
    {
        $this->beConstructedWith('text/plain');
        $this->getValue()->shouldBeEqualTo('text/plain');
    }

    function it_should_have_a_quality_equal_to_one_when_it_is_not_present_in_the_header_string()
    {
        $this->beConstructedWith('text/plain');
        $this->getQuality()->shouldBeEqualTo(1.0);
    }

    function it_should_return_the_quality_when_it_is_present_in_the_header_string()
    {
        $this->beConstructedWith('text/x-dvi; q=0.8');
        $this->getQuality()->shouldBeEqualTo(0.8);
    }

    function it_should_return_the_string_representation()
    {
        $this->beConstructedWith(
            "text/html;mediaparam1=2;mediaparam2=2; q=0.4; extparam=whatever1; extparam2=whatever2"
        );
        $this->__toString()->shouldBeEqualTo(
            'text/html;mediaparam1=2;mediaparam2=2;q=0.4;extparam=whatever1;extparam2=whatever2'
        );
    }

    function it_should_be_aware_of_the_match_all_tag()
    {
        $this->beConstructedWith('*/*;q=0.4');
        $this->shouldHaveAcceptAllTag();
    }

    function it_should_be_aware_of_the_match_all_sub_tag()
    {
        $this->beConstructedWith('application/*;q=0.4');
        $this->shouldHaveAcceptAllSubTag();
    }

    function it_should_return_the_quality_when_it_is_present_in_the_header_string_along_the_match_all_tag()
    {
        $this->beConstructedWith('*/*;q=0.4');
        $this->getQuality()->shouldBeEqualTo(0.4);
    }

    function it_should_be_aware_of_having_a_tag()
    {
        $this->beConstructedWith('application;q=5');
        $this->shouldHaveTag('application');
    }

    function it_should_be_aware_of_having_a_sub_media_type()
    {
        $this->beConstructedWith('application/json;q=5');
        $this->shouldHaveSubTag('json');
    }

    function it_should_be_aware_of_having_a_value_range()
    {
        $this->beConstructedWith('application/*;q=0.4');
        $this->shouldHaveValue('application/*');
        $this->shouldNotHaveValue('json');
    }
}
