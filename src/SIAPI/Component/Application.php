<?php

namespace SIAPI\Component;

use SIAPI\Component\Resource\Linker;
use SIAPI\Component\Resource\Paginator;
use SIAPI\Component\Resource\JsonFactory;

use SIAPI\Component\Search\ResultSet;
use SIAPI\Component\Search\Query\Params;
use SIAPI\Component\Search\RepositoryFactory;

final class Application
{
    /**
     * @var array
     */
    private $config = [
        'collection_size' => 10,
        'search_endpoint' => 'search',
        'image_endpoint'  => 'image'
    ];

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getConfig($key)
    {
        return (array_key_exists($key, $this->config)) ? $this->config[$key] : null;
    }

    /**
     * @param $name
     * @return \SIAPI\Component\Search\Repository\ImageRepository
     */
    public function getRepository($name)
    {
        return RepositoryFactory::make($name, $this);
    }

    /**
     * @param \SIAPI\Component\Search\ResultSet    $resultSet
     * @param \SIAPI\Component\Search\Query\Params $params
     * @param                                      $page
     * @return \SIAPI\Component\Resource\Json
     */
    public function getResponse(ResultSet $resultSet, Params $params, $page = 1)
    {
        $pagination = new Paginator(
            $resultSet->getTotal(),
            $this->getConfig('collection_size'),
            $page
        );

        $linker = new Linker(
            $this->getSearchEndPoint(),
            $pagination,
            $params
        );

        return JsonFactory::makeJsonCollection($resultSet, $linker);
    }

    /**
     * @return string
     */
    public function getSearchEndPoint()
    {
        return $this->formatUrl($this->getConfig('search_endpoint'));
    }

    /**
     * @return string
     */
    public function getImageEndPoint()
    {
        return $this->formatUrl($this->getConfig('image_endpoint'));
    }

    /**
     * @param string $path
     * @return string
     */
    private function formatUrl($path = "")
    {
        $host = $this->getConfig('host');
        if (!preg_match("/\$/", $host)) {
            $host .= "/";
        }
        return sprintf("%s/%s", $host, $path);
    }
}
