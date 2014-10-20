<?php

namespace spec\SIAPI\Component\Negotiation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FactorySpec
 * @package spec\SIAPI\Component\Negotiation
 */
class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Negotiation\Factory');
    }

    function it_should_build_a_language_negotiator()
    {
        $this::build('language', [])->shouldHaveType('\SIAPI\Component\Negotiation\Negotiator\Language');
        $this::build('language', [])->shouldHaveType('\SIAPI\Component\Negotiation\Negotiator');
    }

    function it_should_build_a_charset_negotiator()
    {
        $this::build('charset', [])->shouldHaveType('\SIAPI\Component\Negotiation\Negotiator\Charset');
        $this::build('charset', [])->shouldHaveType('\SIAPI\Component\Negotiation\Negotiator');
    }

    function it_should_build_a_media_negotiator()
    {
        $this::build('media', [])->shouldHaveType('\SIAPI\Component\Negotiation\Negotiator\Media');
        $this::build('media', [])->shouldHaveType('\SIAPI\Component\Negotiation\Negotiator');
    }
}
