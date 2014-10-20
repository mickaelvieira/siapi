<?php

namespace spec\SIAPI\Component\JsonCollection;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

/**
 * Class CollectionSpec
 * @package spec\SIAPI\Component\JsonCollection
 */
class CollectionSpec extends JsonSerializableBehavior
{

    private $version = '1.0';

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\JsonCollection\Collection');
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
     * @param \SIAPI\Component\JsonCollection\Link $link
     */
    function it_should_be_able_to_a_link_object($link)
    {
        $link->jsonSerialize()->willReturn(
            [
                'href' => 'http://domain.com',
            ]
        );
        $this->addLink($link);
        $this->jsonSerialize()->shouldBeEqualToJson('{"version":"1.0","links":[{"href":"http://domain.com"}]}');
    }
}
