<?php

namespace spec\SIAPI\Http\Request\Header\Accept\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AcceptLanguageSpec extends ObjectBehavior
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
        $this->shouldHaveType('SIAPI\Http\Request\Header\Accept\Entity\AcceptLanguage');
    }
}
