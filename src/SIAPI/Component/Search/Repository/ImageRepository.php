<?php


namespace SIAPI\Component\Search\Repository;

use Elastica\Exception\NotImplementedException;
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
     *
     */
    public function __construct()
    {
        $this->search = SearchFactory::make();
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
