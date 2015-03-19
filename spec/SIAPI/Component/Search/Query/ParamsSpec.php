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
            'q' => 'value'
        ]);

        $this->count()->shouldBeEqualTo(1);
    }

    function it_should_only_add_allowed_parameters()
    {
        $this->beConstructedWith([
            'target'       => 'value',
            'satellite_of' => 'value',
            'mission'      => 'value',
            'spacecraft'   => 'value',
            'instrument'   => 'value',
            'page'         => 'value',
            'pretty'       => 'value',
            'q'            => 'value',

            'other1'       => 'value',
            'other2'       => 'value'
        ]);

        $this->count()->shouldBeEqualTo(8);
    }

    function it_should_return_a_string_representation()
    {
        $this->beConstructedWith([
            'target'       => 'value',
            'q'            => 'value1 value2',
        ]);

        $this->__toString()->shouldBeEqualTo('target=value&q=value1+value2');
    }

    function it_should_return_the_param_value_when_it_does_exist()
    {
        $this->beConstructedWith([
            'target'       => 'value',
            'q'            => 'value1 value2',
        ]);
        $this->getParamValue('target')->shouldBeEqualTo('value');
    }

    function it_should_return_the_param_value_when_it_does_not_exist()
    {
        $this->beConstructedWith([]);
        $this->getParamValue('target')->shouldBeNull();
    }

    function it_should_know_when_it_has_a_specific_param()
    {
        $this->beConstructedWith([
            'target' => 'value'
        ]);
        $this->hasParam('target')->shouldBeEqualTo(true);
    }
}
