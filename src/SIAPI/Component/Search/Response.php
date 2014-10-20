<?php

namespace SIAPI\Component\Search;

interface Response
{
    /**
     * @return int
     */
    public function getTotal();

    /**
     * @return \SIAPI\Component\Search\ResultSet
     */
    public function getResultSet();
} 