<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class MediaSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class MediaSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Collection\Media $collection
     * @param \SIAPI\Negotiation\Strategy\Media $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Media');
    }
}
