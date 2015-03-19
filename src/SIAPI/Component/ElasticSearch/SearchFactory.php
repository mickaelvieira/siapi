<?php

namespace SIAPI\Component\ElasticSearch;

use SIAPI\Component\ElasticSearch\Client as SearchClient;
use SIAPI\Component\ElasticSearch\Query\Image as QueryImage;
use SIAPI\Component\ElasticSearch\Search\Image as SearchImage;

class SearchFactory
{
    /**
     * @return \SIAPI\Component\ElasticSearch\Search\Image
     */
    public static function make()
    {
        $client = new SearchClient();
        $query  = new QueryImage();

        return new SearchImage($client, $query);
    }
}
