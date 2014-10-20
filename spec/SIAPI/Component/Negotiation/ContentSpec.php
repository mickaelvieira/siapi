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
    /**
     * @param \Psr\Http\Message\MessageInterface $message
     */
    function it_is_initializable($message)
    {
        $this->beConstructedWith($message);
        $this->shouldHaveType('SIAPI\Component\Negotiation\Content');
    }
}
