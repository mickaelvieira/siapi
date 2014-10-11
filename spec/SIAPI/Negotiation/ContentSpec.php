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
    /**
     * @param \Psr\Http\Message\MessageInterface $message
     */
    function it_is_initializable($message)
    {
        $this->beConstructedWith($message);
        $this->shouldHaveType('SIAPI\Negotiation\Content');
    }
}
