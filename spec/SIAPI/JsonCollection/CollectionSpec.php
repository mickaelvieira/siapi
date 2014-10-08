<?php

namespace spec\SIAPI\JsonCollection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CollectionSpec
 * @package spec\SIAPI\JsonCollection
 */
class CollectionSpec extends ObjectBehavior
{

    private $version = '1.0';

    /**
     * {@inheritdoc}
     */
    public function getMatchers()
    {
        return [
            'beEqualToJson' => function ($subject, $value) {
                return json_encode($subject, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\JsonCollection\Collection');
    }

    function it_should_have_the_version_number()
    {
        $this->jsonSerialize()->shouldReturn(
            [
                'version' => $this->version
            ]
        );
    }

    /**
     * @param \SIAPI\JsonCollection\Link $link
     */
    function it_should_be_able_to_a_link_object($link)
    {
        $link->jsonSerialize()->willReturn(
            [
                'href' => 'http://domain.com',
            ]
        );
        $this->addLink($link);
        $this->jsonSerialize()->shouldBeEqualToJson("{'version':'1.0','links':[{'href':'http://domain.com'}]}");
    }
}
