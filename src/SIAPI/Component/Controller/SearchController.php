<?php

namespace SIAPI\Component\Controller;

use SIAPI\Component\Collection\Pagination;
use SIAPI\Component\Search\Repository\ElasticSearch as RepositoryElasticSearch;

use JsonCollection\Collection;
use SIAPI\Component\ElasticSearch\Client as SearchClient;
use SIAPI\Component\ElasticSearch\Query\Image as QueryImage;
use SIAPI\Component\ElasticSearch\Search\Image as SearchImage;

use SIAPI\Component\Resource\JsonCollection\Query;
use SIAPI\Component\Resource\JsonCollection\Template;
use SIAPI\Component\Resource\JsonCollection\Link;
use SIAPI\Component\Resource\JsonCollection\Item;

class SearchController
{
    public function indexAction()
    {

        $client   = new SearchClient();
        $query    = new QueryImage();
        $search   = new SearchImage($client, $query);
        $response = $search->getResultSet();

        $pagination = new Pagination();
        $pagination->setPage(3);
        $pagination->setPageSize(10);
        $pagination->setTotalResult($response->getTotal());

        $collection =  new Collection();

        $collection->setHref('search?mission=');

        $firstLink = new Link\First();
        $firstLink->setHref("/search?page=" . $pagination->getFirstPage());

        $lastLink = new Link\Last();
        $lastLink->setHref("/search?page=" . $pagination->getLastPage());

        $prevLink = new Link\Prev();
        $prevLink->setHref("/search?page=" . $pagination->getPrevPage());

        $nextLink = new Link\Next();
        $nextLink->setHref("/search?page=" . $pagination->getNextPage());

        $collection->addLink($firstLink);
        $collection->addLink($lastLink);
        $collection->addLink($prevLink);
        $collection->addLink($nextLink);

        $queryImage = new Query\Image();
        foreach ($response->getFacets() as $name => $values) {
            $queryImage->setValueToQueryParameters($name, $values);
        }
        $collection->addQuery($queryImage);
        $collection->setTemplate(new Template\Image());


        foreach ($response->getResultSet() as $result) {
            /** @var \SIAPI\Component\Search\Result\Image $result */
            /** @var \SIAPI\Component\Search\Result\Format $format */

            $formats = $result->getFormats();
            $format = $formats[0];

            $image = new Item\Image();
            $image->setHref($format->getFilename());
            $image->setDataValue('mission', $result->getMission());
            $image->setDataValue('target', $result->getTarget());
            $image->setDataValue('instrument', $result->getInstrument());
            $image->setDataValue('source', $result->getSource());
            $image->setDataValue('spacecraft', $result->getSpacecraft());
            $collection->addItem($image);
        }

        //$result = new \stdClass();
        //$result->collection = $collection;

        return json_encode($collection, JSON_PRETTY_PRINT);

        //return file_get_contents(realpath($_SERVER['DOCUMENT_ROOT'] . "/../spec/fixtures/jsoncollection/collection.json"));
    }
} 