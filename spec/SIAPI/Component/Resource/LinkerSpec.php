<?php

namespace spec\SIAPI\Component\Resource;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SIAPI\Component\Resource\Pagination;
use SIAPI\Component\Resource\Paginator;
use SIAPI\Component\Search\Query\Params;

class LinkerSpec extends ObjectBehavior
{

    function it_is_initializable(Pagination $pagination)
    {
        $this->beConstructedWith($pagination, new Params([]));
        $this->shouldHaveType('SIAPI\Component\Resource\Linker');
    }

    function it_should_return_the_first_page_url_when_there_is_no_params()
    {
        $pagination = new Paginator(100, 10, 1);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getFirstPageUrl()->shouldBeEqualTo('page=1');
    }

    function it_should_return_the_first_page_url_when_there_are_params()
    {
        $pagination = new Paginator(100, 10, 1);
        $params = new Params([
            'q' => 'value'
        ]);

        $this->beConstructedWith($pagination, $params);

        $this->getFirstPageUrl()->shouldBeEqualTo('q=value&page=1');
    }

    function it_should_return_the_last_page_url_when_there_is_no_params()
    {
        $pagination = new Paginator(100, 10);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getLastPageUrl()->shouldBeEqualTo('page=10');
    }

    function it_should_return_the_last_page_url_when_there_are_params()
    {
        $pagination = new Paginator(100, 10);
        $params = new Params([
            'q' => 'value'
        ]);

        $this->beConstructedWith($pagination, $params);

        $this->getLastPageUrl()->shouldBeEqualTo('q=value&page=10');
    }

    function it_should_return_the_current_page_url_when_there_is_no_params()
    {
        $pagination = new Paginator(100, 10, 2);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getCurrentPageUrl()->shouldBeEqualTo('page=2');
    }

    function it_should_return_the_current_page_url_when_there_are_params()
    {
        $pagination = new Paginator(100, 10, 2);
        $params = new Params([
            'q' => 'value'
        ]);

        $this->beConstructedWith($pagination, $params);

        $this->getCurrentPageUrl()->shouldBeEqualTo('q=value&page=2');
    }

    function it_should_return_the_next_page_url_when_there_is_no_params()
    {
        $pagination = new Paginator(100, 10, 2);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getNextPageUrl()->shouldBeEqualTo('page=3');
    }

    function it_should_return_the_next_page_url_when_there_are_params()
    {
        $pagination = new Paginator(100, 10, 2);
        $params = new Params([
            'q' => 'value'
        ]);

        $this->beConstructedWith($pagination, $params);

        $this->getNextPageUrl()->shouldBeEqualTo('q=value&page=3');
    }

    function it_should_return_null_when_there_is_no_next_page()
    {
        $pagination = new Paginator(100, 10, 10);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getNextPageUrl()->shouldBeNull();
    }

    function it_should_return_the_prev_page_url_when_there_is_no_params()
    {
        $pagination = new Paginator(100, 10, 2);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getPrevPageUrl()->shouldBeEqualTo('page=1');
    }

    function it_should_return_the_prev_page_url_when_there_are_params()
    {
        $pagination = new Paginator(100, 10, 2);
        $params = new Params([
            'q' => 'value'
        ]);

        $this->beConstructedWith($pagination, $params);

        $this->getPrevPageUrl()->shouldBeEqualTo('q=value&page=1');
    }

    function it_should_return_null_when_there_is_no_prev_page()
    {
        $pagination = new Paginator(100, 10, 1);
        $params = new Params([]);

        $this->beConstructedWith($pagination, $params);

        $this->getPrevPageUrl()->shouldBeNull();
    }
}
