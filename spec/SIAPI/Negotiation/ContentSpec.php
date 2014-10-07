<?php

namespace spec\SIAPI\Negotiation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class NegotiationSpec
 * @package spec\SIAPI\Negotiation
 */
class ContentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(array());
        $this->shouldHaveType('SIAPI\Negotiation\Content');
    }
}
