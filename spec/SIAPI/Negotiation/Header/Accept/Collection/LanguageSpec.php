<?php

namespace spec\SIAPI\Negotiation\Header\Accept\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LanguageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Header\Accept\Collection\Language');
    }
}