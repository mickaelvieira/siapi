<?php

namespace SIAPI\Search;

interface Response
{
    /**
     * @return int
     */
    public function getTotal();

    /**
     * @return \SIAPI\Search\ResultSet
     */
    public function getResultSet();
} 