<?php

namespace spec\SIAPI\Component\Resource\JsonCollection\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Resource\JsonCollection\Collection\Image');
    }
}
