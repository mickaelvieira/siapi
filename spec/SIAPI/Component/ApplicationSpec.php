<?php

namespace spec\SIAPI\Component;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Application');
    }

    function it_can_be_initializable_with_options()
    {
        $this->beConstructedWith([]);
        $this->shouldHaveType('SIAPI\Component\Application');
    }

    function it_should_return_an_option()
    {
        $this->beConstructedWith([
            'name' => 'value'
        ]);
        $this->getConfig('name')->shouldBeEqualTo('value');
    }

    function it_should_return_null_when_config_does_not_exit()
    {
        $this->beConstructedWith([
            'name' => 'value'
        ]);
        $this->getConfig('test')->shouldBeNull();
    }

    function it_should_override_default_configuration()
    {
        $this->beConstructedWith([
            'search_endpoint' => 'new-search'
        ]);
        $this->getConfig('search_endpoint')->shouldBeEqualTo('new-search');
        $this->getConfig('image_endpoint')->shouldBeEqualTo('image');
    }
}
