<?php

namespace spec\SIAPI\Negotiation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Factory');
    }

    function it_should_build_a_language_negotiator()
    {
        $this::build('language', array())->shouldHaveType('\SIAPI\Negotiation\Negotiator\Language');
        $this::build('language', array())->shouldHaveType('\SIAPI\Negotiation\Negotiator');
    }

    function it_should_build_a_charset_negotiator()
    {
        $this::build('charset', array())->shouldHaveType('\SIAPI\Negotiation\Negotiator\Charset');
        $this::build('charset', array())->shouldHaveType('\SIAPI\Negotiation\Negotiator');
    }

    function it_should_build_a_media_negotiator()
    {
        $this::build('media', array())->shouldHaveType('\SIAPI\Negotiation\Negotiator\Media');
        $this::build('media', array())->shouldHaveType('\SIAPI\Negotiation\Negotiator');
    }

    function it_should_throw_an_exception_when_the_class_does_exist()
    {
        $this->shouldThrow('\LogicException')->during('build', array('whatever', array()));
    }
}
