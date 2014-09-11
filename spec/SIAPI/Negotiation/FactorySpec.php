<?php

namespace spec\SIAPI\Negotiation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FactorySpec
 * @package spec\SIAPI\Negotiation
 */
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

    function it_should_inject_the_dependencies_to_media_negotiator()
    {
        $this::build('media', array())->getStrategy()->shouldHaveType('\SIAPI\Negotiation\Strategy\Media');
        $this::build('media', array())->getCollection()->shouldHaveType(
            '\SIAPI\Negotiation\Header\Accept\Collection\Media'
        );
    }

    function it_should_inject_the_dependencies_to_charset_negotiator()
    {
        $this::build('charset', array())->getStrategy()->shouldHaveType('\SIAPI\Negotiation\Strategy\Charset');
        $this::build('charset', array())->getCollection()->shouldHaveType(
            '\SIAPI\Negotiation\Header\Accept\Collection\Charset'
        );
    }

    function it_should_inject_the_dependencies_to_language_negotiator()
    {
        $this::build('language', array())->getStrategy()->shouldHaveType('\SIAPI\Negotiation\Strategy\Language');
        $this::build('language', array())->getCollection()->shouldHaveType(
            '\SIAPI\Negotiation\Header\Accept\Collection\Language'
        );
    }
}
