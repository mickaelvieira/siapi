<?php

namespace spec\SIAPI\Component\Search\Query;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParamsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith([]);
        $this->shouldHaveType('SIAPI\Component\Search\Query\Params');
    }

    function it_should_be_countable()
    {
        $this->beConstructedWith([]);
        $this->shouldImplement('Countable');
        $this->count()->shouldBeEqualTo(0);
    }

    function it_should_be_traversable()
    {
        $this->beConstructedWith([]);
        $this->shouldImplement('Traversable');
    }

    function it_should_add_elements_when_it_is_initialized()
    {
        $this->beConstructedWith([
            'name' => 'value'
        ]);

        $this->count()->shouldBeEqualTo(1);
    }
}