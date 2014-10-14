<?php

namespace SIAPI\Collection;

use SIAPI\JsonCollection\Item;
use SIAPI\JsonCollection\Collection;
use SIAPI\JsonCollection\DataValueInjector;
use SIAPI\Search\ResultSet;
use SIAPI\Search\Result\Image;

class Builder
{

    public function getCollection(ResultSet $resultSet)
    {


        return new Collection();
    }

    /**
     * @param \SIAPI\Search\Result\Image $image
     * @return \SIAPI\JsonCollection\Item
     */
    public function getItemFromImageResult(Image $image)
    {
        $item = new Item\Image();
        $item->setHref("/image/" . $image->getId());

        DataValueInjector::injectDataValues($item, $image->toArray());

        return $item;
    }
}
