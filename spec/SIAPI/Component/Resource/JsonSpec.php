<?php

namespace spec\SIAPI\Component\Resource;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SIAPI\Component\Resource\Converter;
use SIAPI\Component\Resource\JsonRenderer;
use SIAPI\Component\Search\ResultSet;

class JsonSpec extends ObjectBehavior
{

    /**
     * @param \SIAPI\Component\Resource\Converter    $converter
     * @param \SIAPI\Component\Resource\JsonRenderer $renderer
     */
    function it_is_initializable(Converter $converter, JsonRenderer $renderer)
    {
        $resultSet = new ResultSet(0);

        $this->beConstructedWith($resultSet, $converter, $renderer);
        $this->shouldHaveType('SIAPI\Component\Resource\Json');
    }
}
