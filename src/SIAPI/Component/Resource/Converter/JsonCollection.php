<?php

namespace SIAPI\Component\Resource\Converter;

use CollectionJson\Entity;
use CollectionJson\Type;

use SIAPI\Component\Application;
use SIAPI\Component\Resource\Converter;
use SIAPI\Component\Resource\Linker;
use SIAPI\Component\Search\Result;
use SIAPI\Component\Search\Result\Image;
use SIAPI\Component\Search\Result\Format;
use SIAPI\Component\Search\ResultSet;

final class JsonCollection implements Converter
{

    /**
     * @var \SIAPI\Component\Application
     */
    private $application;

    /**
     * @var \SIAPI\Component\Resource\Linker
     */
    private $linker;

    /**
     * @param \SIAPI\Component\Application     $application
     * @param \SIAPI\Component\Resource\Linker $linker
     */
    public function __construct(Application $application, Linker $linker)
    {
        $this->application = $application;
        $this->linker      = $linker;
    }

    /**
     * @param \SIAPI\Component\Search\ResultSet $resultSet
     * @return \CollectionJson\Entity\Collection
     */
    public function getResource(ResultSet $resultSet)
    {
        $collection = new Entity\Collection();

        $collection->setHref($this->linker->getCurrentPageUrl());
        $collection->addLink([
            'rel'  => Type\Relation::FIRST,
            'href' => $this->linker->getFirstPageUrl()
        ]);
        $collection->addLink([
            'rel'  => Type\Relation::LAST,
            'href' => $this->linker->getLastPageUrl()
        ]);
        $collection->addLink([
            'rel'  => Type\Relation::PREV,
            'href' => $this->linker->getPrevPageUrl()
        ]);
        $collection->addLink([
            'rel' => Type\Relation::NEXT,
            'href' => $this->linker->getNextPageUrl()
        ]);

        foreach ($resultSet as $result) {
            $collection->addItem($this->getItem($result));
        }
        return $collection;
    }

    /**
     * @param \SIAPI\Component\Search\Result\Image $result
     * @return \CollectionJson\Entity\Item
     */
    private function getItem(Image $result)
    {
        $item = new Entity\Item();
        $item->setHref($this->application->getImageEndPoint() . $result->getId());

        //$item->addData(new Entity\Data(['name' => 'target', 'value' => $result->getTarget()]));

        $item->addDataSet([
            [
                'name' => 'target',
                'value' => $result->getTarget()
            ],
            [
                'name' => 'satellite_of',
                'value' => $result->getSatelliteOf()
            ],
            [
                'name' => 'mission',
                'value' => $result->getMission()
            ],
            [
                'name' => 'spacecraft',
                'value' => $result->getSpacecraft()
            ],
            [
                'name' => 'instrument',
                'value' => $result->getInstrument()
            ]
        ]);

        foreach ($result as $format) {
            $item->addLink($this->getLink($format));
        }

        return $item;
    }

    /**
     * @param \SIAPI\Component\Search\Result\Format $format
     * @return \CollectionJson\Entity\Link
     */
    private function getLink(Format $format)
    {
        $link = new Entity\Link();
        $link->setHref($format->getFileName());

        return $link;
    }
}
