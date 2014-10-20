<?php

namespace spec\SIAPI\Component\Negotiation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class NegotiationSpec
 * @package spec\SIAPI\Component\Negotiation
 */
class ContentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(array());
        $this->shouldHaveType('SIAPI\Component\Negotiation\Content');
    }
}
