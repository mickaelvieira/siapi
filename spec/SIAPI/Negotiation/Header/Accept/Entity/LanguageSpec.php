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
    function let()
    {
        $this->beConstructedWith("test");
    }

    function it_should_return_an_empty_string_when_input_is_empty()
    {
        $this->beConstructedWith('');
        $this->__toString()->shouldBeEqualTo('');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Entity\Language');
    }
}
