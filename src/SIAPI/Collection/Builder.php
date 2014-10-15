<?php

namespace SIAPI\Collection;

use SIAPI\JsonCollection\Item;
use SIAPI\JsonCollection\Collection;
use SIAPI\JsonCollection\DataValueInjector;
use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Query;
use SIAPI\JsonCollection\Template;
use SIAPI\Search\ResultSet;
use SIAPI\Search\Result\Image;

class Builder
{

    public function getCollection(ResultSet $resultSet)
    {
        $collection =  new Collection();

        $collection->setHref('search?mission=');

        $collection->addLink(new Link\First());
        $collection->addLink(new Link\Prev());
        $collection->addLink(new Link\Next());
        $collection->addLink(new Link\Last());

        $collection->addQuery(new Query\Image());
        $collection->setTemplate(new Template\Image());

        $collection->addItem(new Item\Image());
        $collection->addItem(new Item\Image());
        $collection->addItem(new Item\Image());
        $collection->addItem(new Item\Image());

        return $collection;
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

        foreach ($image->getFormats() as $format) {

            /** @var \SIAPI\Search\Result\Format $format */
            if ($format->getMimeType() === 'image/jpeg') {
                $link = new Link\Image\Jpeg();
                $link->setHref("/image/" . $image->getId() . ".jpg");
                $item->addLink($link);
            }
            if ($format->getMimeType() === 'image/tiff') {
                $link = new Link\Image\Tiff();
                $link->setHref("/image/" . $image->getId() . ".tif");
                $item->addLink($link);
            }
        }

        return $item;
    }
}
