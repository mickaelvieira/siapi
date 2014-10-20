<?php

namespace spec\SIAPI\Component\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaginationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Collection\Pagination');
    }

    function it_should_return_the_first_page()
    {
        $this->getFirstPage()->shouldBeEqualTo(1);
    }

    function it_should_calculate_the_last_page_number()
    {
        $this->setTotalResult(83);
        $this->setPageSize(10);
        $this->getLastPage()->shouldBeEqualTo(8);
    }

    function it_should_return_the_first_page_when_it_has_not_been_set_up()
    {
        $this->setPageSize(10);
        $this->getLastPage()->shouldBeEqualTo(1);
    }

    function it_should_calculate_the_prev_page_number()
    {
        $this->setTotalResult(83);
        $this->setPageSize(10);
        $this->setPage(5);
        $this->getPrevPage()->shouldBeEqualTo(4);
    }

    function it_should_return_null_when_the_previous_page_is_out_of_boundaries()
    {
        $this->setTotalResult(83);
        $this->setPageSize(10);
        $this->setPage(1);
        $this->getPrevPage()->shouldBeNull(1);
    }

    function it_should_return_null_for_the_previous_page_when_it_has_not_been_set_up()
    {
        $this->getPrevPage()->shouldBeNull();
    }

    function it_should_calculate_the_next_page_number()
    {
        $this->setTotalResult(83);
        $this->setPageSize(10);
        $this->setPage(5);
        $this->getNextPage()->shouldBeEqualTo(6);
    }

    function it_should_return_null_when_the_next_page_is_out_of_boundaries()
    {
        $this->setTotalResult(83);
        $this->setPageSize(10);
        $this->setPage(8);
        $this->getNextPage()->shouldBeNull();
    }

    function it_should_return_null_for_the_next_page_when_it_has_not_been_set_up()
    {
        $this->getNextPage()->shouldBeNull();
    }
}
