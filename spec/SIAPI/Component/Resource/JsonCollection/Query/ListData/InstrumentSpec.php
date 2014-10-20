<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Query\ListData;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InstrumentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Query\ListData\Instrument');
        $this->shouldBeAnInstanceOf('SIAPI\Component\JsonCollection\ListData');
    }

    function it_should_not_be_required()
    {
        $this->shouldBeMultiple();
    }
}
