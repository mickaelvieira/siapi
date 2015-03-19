<?php

namespace SIAPI\Component\Resource;

use SIAPI\Component\Search\ResultSet;

interface Converter
{

    /**
     * @param \SIAPI\Component\Search\ResultSet $resultSet
     * @return mixed
     */
    public function getResource(ResultSet $resultSet);
}
