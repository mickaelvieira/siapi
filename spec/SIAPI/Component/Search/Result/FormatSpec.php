<?php

namespace spec\SIAPI\Component\Search\Result;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormatSpec extends ObjectBehavior
{
    function it_is_initializable_with_a_file_name()
    {
        $this->beConstructedWith('name');
        $this->getFileName()->shouldBeEqualTo('name');
        $this->shouldHaveType('SIAPI\Component\Search\Result\Format');
    }
}
