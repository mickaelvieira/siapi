<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CharsetSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class CharsetSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Collection\Charset $collection
     * @param \SIAPI\Negotiation\Strategy\Charset $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Charset');
    }
}
