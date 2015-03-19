<?php

namespace spec\SIAPI\Component\Search;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SIAPI\Component\Search\Result\Image;

class ResultSetSpec extends ObjectBehavior
{
    function it_is_initializable_with_a_total_and_a_set_of_data()
    {
        $this->beConstructedWith(0);
        $this->shouldHaveType('SIAPI\Component\Search\ResultSet');
    }

    function it_should_return_the_number_total_of_available_results()
    {
        $this->beConstructedWith(0);
        $this->getTotal()->shouldBeEqualTo(0);
    }

    function it_should_add_the_data_as_result_object()
    {
        $this->beConstructedWith(10, [
            new Image(1),
            new Image(2),
            new Image(3),
            new Image(4)
        ]);
        $this->getTotal()->shouldBeEqualTo(10);
        $this->count()->shouldBeEqualTo(4);
    }
}
