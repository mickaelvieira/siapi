<?php

namespace spec\SIAPI\Negotiation;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class NegotiationSpec
 * @package spec\SIAPI\Negotiation
 */
class NegotiationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(array());
        $this->shouldHaveType('SIAPI\Negotiation\Negotiation');
    }

    function it_should_throw_an_exception_when_calling_a_invalid_method()
    {
        $this->beConstructedWith(array());
        $this->shouldThrow('\BadFunctionCallException')->duringWhatever(array());
    }

    function it_should_throw_an_exception_when_calling_without_any_argument()
    {
        $this->beConstructedWith(array());
        $this->shouldThrow('\BadFunctionCallException')->duringMedia();
    }

    function it_should_throw_an_exception_when_calling_with_a_argument_of_a_wrong_type()
    {
        $this->beConstructedWith(array());
        $this->shouldThrow('\BadFunctionCallException')->duringLanguage('supported');
    }

    function it_should_not_throw_any_errors_when_the_method_media_is_called_with_right_arguments()
    {
        $this->beConstructedWith(array());
        $this->shouldNotThrow('\BadFunctionCallException')->duringMedia(array());
    }

    function it_should_not_throw_any_errors_when_the_method_language_is_called_with_right_arguments()
    {
        $this->beConstructedWith(array());
        $this->shouldNotThrow('\BadFunctionCallException')->duringLanguage(array());
    }

    function it_should_not_throw_any_errors_when_the_method_charset_is_called_with_right_arguments()
    {
        $this->beConstructedWith(array());
        $this->shouldNotThrow('\BadFunctionCallException')->duringCharset(array());
    }
}
