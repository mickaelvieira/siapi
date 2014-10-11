<?php

namespace SIAPI\ElasticSearch;

use SIAPI\ElasticSearch\Client as SearchClient;
use SIAPI\ElasticSearch\Query\Image as QueryImage;
use SIAPI\ElasticSearch\Search\Image as SearchImage;

class SearchFactory
{
    /**
     * @return \SIAPI\ElasticSearch\Search $name
     */
    public static function create()
    {
        $client = new SearchClient();
        $query  = new QueryImage();

        return new SearchImage($client, $query);
    }
} 