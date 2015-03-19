<?php

namespace spec\SIAPI\Component\Resource;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaginatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(0, 0);
        $this->shouldHaveType('SIAPI\Component\Resource\Paginator');
    }

    function it_should_return_the_first_page()
    {
        $this->beConstructedWith(0, 0);
        $this->getFirstPage()->shouldBeEqualTo(1);
    }

    function it_should_calculate_the_last_page_number()
    {
        $this->beConstructedWith(83, 10);
        $this->getLastPage()->shouldBeEqualTo(8);
    }

    function it_should_calculate_the_prev_page_number()
    {
        $this->beConstructedWith(83, 10, 5);
        $this->getPrevPage()->shouldBeEqualTo(4);
    }

    function it_should_return_null_when_the_previous_page_is_out_of_boundaries()
    {
        $this->beConstructedWith(83, 10, 1);
        $this->getPrevPage()->shouldBeNull();
    }

    function it_should_calculate_the_next_page_number()
    {
        $this->beConstructedWith(83, 10, 5);
        $this->getNextPage()->shouldBeEqualTo(6);
    }

    function it_should_return_null_when_the_next_page_is_out_of_boundaries()
    {
        $this->beConstructedWith(83, 10, 8);
        $this->getNextPage()->shouldBeNull();
    }

    function it_should_calculate_the_current_page_number()
    {
        $this->beConstructedWith(83, 10, 3);
        $this->getCurrentPage()->shouldBeEqualTo(3);
    }

    function it_should_return_the_page_size()
    {
        $this->beConstructedWith(83, 10, 3);
        $this->getPageSize()->shouldBeEqualTo(10);
    }

    function it_should_return_start_result_equal_to_zero_when_on_page_une()
    {
        $this->beConstructedWith(83, 10);
        $this->getFirstResult()->shouldBeEqualTo(0);
    }

    function it_should_return_start_result_value()
    {
        $this->beConstructedWith(83, 10, 2);
        $this->getFirstResult()->shouldBeEqualTo(10);
    }

    function it_should_return_end_result_value()
    {
        $this->beConstructedWith(83, 10, 2);
        $this->getLastResult()->shouldBeEqualTo(19);
    }
}
