<?php

namespace spec\SIAPI\Component\Collection;

use SIAPI\Component\PhpSpec\JsonSerializableBehavior;

class BuilderSpec extends JsonSerializableBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Component\Collection\Builder');
    }

    /**
     * @param \SIAPI\Component\Search\ResultSet $resultSet
     */
    function it_should_build_a_collection($resultSet)
    {
        $this->getCollection($resultSet)->shouldReturnAnInstanceOf('CollectionNextJson\Entity\Collection');
    }

    /**
     * @param \SIAPI\Component\Search\Result\Image $image
     */
    function it_should_build_an_item_image($image)
    {
        $prophet = $this->getProphet();

        $image->getId()->willReturn(99);
        $image->getTarget()->willReturn("Saturn");
        $image->getMission()->willReturn("Cassini-Huygens");
        $image->getSpacecraft()->willReturn("Cassini Orbiter");
        $image->getInstrument()->willReturn("Imaging Science Subsystem - Wide Angle");
        $image->getSource()->willReturn("Cassini Imaging Team");

        $image->toArray()->willReturn(array(
            'id'          => 99,
            'target'      => 'Saturn',
            'satelliteof' => 'Sol (our sun)',
            'mission'     => 'Cassini-Huygens',
            'spacecraft'  => 'Cassini Orbiter',
            'instrument'  => 'Imaging Science Subsystem - Wide Angle',
            'extra'       => null,
            'source'      => 'Cassini Imaging Team',
        ));


        $formatJpg = $prophet->prophesize('\SIAPI\Component\Search\Result\Format');
        $formatJpg->getMimeType()->willReturn('image/jpeg');

        $formatTif = $prophet->prophesize('\SIAPI\Component\Search\Result\Format');
        $formatTif->getMimeType()->willReturn('image/tiff');

        $image->getFormats()->willReturn(
            array(
                $formatJpg,
                $formatTif
            )
        );


        $this->getItemFromImageResult($image)->shouldReturnAnInstanceOf('CollectionJson\Entity\Item');

        $json = $this->getJsonFixtureContent('jsoncollection/item/image.json');
        //$this->getItemFromImageResult($image)->jsonSerialize()->shouldBeEqualToJson($json);
    }
}
