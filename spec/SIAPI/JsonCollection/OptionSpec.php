<?php

namespace spec\SIAPI\JsonCollection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class OptionSpec
 * @package spec\SIAPI\JsonCollection
 */
class OptionSpec extends ObjectBehavior
{

    private $version = '1.0';

    /**
     * {@inheritdoc}
     */
    public function getMatchers()
    {
        return [
            'haveBeEqualToJson' => function ($subject, $value) {
                return json_encode($subject, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\JsonCollection\Option');
    }

    function it_should_be_return_an_array_representation()
    {
        $this->setValue('my value');
        $this->setPrompt('my prompt value');
        $this->jsonSerialize()->shouldHaveBeEqualToJson("{'value':'my value','prompt':'my prompt value'");
    }

    function it_should_have_accessor_to_get_the_data()
    {
        $this->setValue('my value');
        $this->setPrompt('my prompt value');

        $this->getValue()->shouldBeEqualTo('my value');
        $this->getPrompt()->shouldBeEqualTo('my prompt value');
    }

    function it_should_not_return_empty_values_in_the_array_representation()
    {
        $this->setValue('my value');
        $this->setPrompt('');
        $this->jsonSerialize()->shouldHaveBeEqualToJson("{'value':'my value'");
    }

    function it_should_not_return_null_values_in_the_array_representation()
    {
        $this->setValue('my value');
        $this->jsonSerialize()->shouldHaveBeEqualToJson("{'value':'my value'");
    }
}
