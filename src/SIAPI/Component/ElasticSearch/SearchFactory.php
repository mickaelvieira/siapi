<?php

namespace SIAPI\Component\ElasticSearch;

use SIAPI\Component\Application;
use SIAPI\Component\ElasticSearch\Client as SearchClient;
use SIAPI\Component\ElasticSearch\Query\Image as QueryImage;
use SIAPI\Component\ElasticSearch\Search\Image as SearchImage;

class SearchFactory
{
    /**
     * @param \SIAPI\Component\Application $application
     * @return \SIAPI\Component\ElasticSearch\Search\Image
     */
    public static function make(Application $application)
    {
        $client = new SearchClient($application->getConfig('elastic_search'));
        $query  = new QueryImage();

        return new SearchImage($client, $query);
    }
}
