<?php

namespace spec\SIAPI\Collection\JSON;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class CollectionSpec
 * @package spec\SIAPI\Collection\JSON
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
            'haveBeEqualToJson' => function ($subject, $value) {
                return json_encode($subject, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        ];
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Collection\JSON\Collection');
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
     * @param \SIAPI\Collection\JSON\Link $link
     */
    function it_should_be_able_to_a_link_object($link)
    {
        $link->jsonSerialize()->willReturn(
            [
                'href' => 'http://domain.com',
            ]
        );
        $this->addLink($link);
        $this->jsonSerialize()->shouldHaveBeEqualToJson("{'version':'1.0','links':[{'href':'http://domain.com'}]}");
    }
}
