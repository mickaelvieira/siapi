<?php

namespace SIAPI\Component\Search;

use SIAPI\Component\Search\Query\Params;

interface ImageRepository
{
    /**
     * @param int $id
     * @return \SIAPI\Component\Search\ResultSet
     */
    public function getById($id);

    /**
     * @param Params $params
     * @return \SIAPI\Component\Search\ResultSet
     */
    public function findAllByParameters(Params $params);
}
