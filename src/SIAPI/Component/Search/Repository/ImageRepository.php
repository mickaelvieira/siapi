<?php


namespace SIAPI\Component\Search\Repository;

use Elastica\Exception\NotImplementedException;
use SIAPI\Component\Application;
use SIAPI\Component\Search\ImageRepository as ImageRepositoryInterface;
use SIAPI\Component\Search\Query\Params;
use SIAPI\Component\ElasticSearch\SearchFactory;

final class ImageRepository implements ImageRepositoryInterface
{

    /**
     * @var \SIAPI\Component\Search\Search
     */
    private $search;

    /**
     * @param \SIAPI\Component\Application $application
     */
    public function __construct(Application $application)
    {
        $this->search = SearchFactory::make($application);
    }

    /**
     * @param int $id
     * @return \SIAPI\Component\Search\ResultSet
     */
    public function getById($id)
    {
        throw new NotImplementedException(
            sprintf(
                "Method %s is not implemented",
                __METHOD__
            )
        );
    }

    /**
     * @param Params $params
     * @return \SIAPI\Component\Search\ResultSet
     */
    public function findAllByParameters(Params $params)
    {
        return $this->search->getResultSet();
    }
}
