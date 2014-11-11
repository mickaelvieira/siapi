<?php

namespace SIAPI\Component\Collection;

use SIAPI\Component\Resource\JsonCollection\Item;
use JsonCollection\Collection;
//use JsonCollection\DataValueInjector;
use SIAPI\Component\Resource\JsonCollection\Link;
use SIAPI\Component\Resource\JsonCollection\Query;
use SIAPI\Component\Resource\JsonCollection\Template;
use SIAPI\Component\Search\ResultSet;
use SIAPI\Component\Search\Result\Image;

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
     * @param \SIAPI\Component\Search\Result\Image $image
     * @return \JsonCollection\Item
     */
    public function getItemFromImageResult(Image $image)
    {
        $item = new Item\Image($image->toArray());
        $item->setHref("/image/" . $image->getId());

        //DataValueInjector::injectDataValues($item, $image->toArray());

        foreach ($image->getFormats() as $format) {

            /** @var \SIAPI\Component\Search\Result\Format $format */
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
