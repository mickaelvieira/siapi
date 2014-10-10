<?php

namespace spec\SIAPI\JsonCollection;

use SIAPI\PhpSpec\JsonSerializableBehavior;

/**
 * Class OptionSpec
 * @package spec\SIAPI\JsonCollection
 */
class OptionSpec extends JsonSerializableBehavior
{
    /**
     * {@inheritdoc}
     */
    public function getMatchers()
    {
        return [
            'beEqualToJson' => function ($subject, $value) {
                $json = json_encode($subject, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                if (!($json === $value)) {
                    var_dump($json);
                    var_dump($value);
                }


                return $json === $value;
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
        $this->jsonSerialize()->shouldBeEqualToJson('{"value":"my value","prompt":"my prompt value"}');
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
        $this->jsonSerialize()->shouldBeEqualToJson('{"value":"my value"}');
    }

    function it_should_not_return_null_values_in_the_array_representation()
    {
        $this->setValue('my value');
        $this->jsonSerialize()->shouldBeEqualToJson('{"value":"my value"}');
    }
}
